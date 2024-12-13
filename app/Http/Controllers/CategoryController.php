<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-category|edit-category|delete-category', ['only' => ['index','show']]);
       $this->middleware('permission:create-category', ['only' => ['create','store']]);
       $this->middleware('permission:edit-category', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-category', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::latest()->paginate(10)
        ]);
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(StoreCategoryRequest $request)
    {
        // Lấy dữ liệu đã được xác thực từ request
        $data = $request->validated();

        // Kiểm tra xem có file hình ảnh không và xử lý
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Lưu file vào thư mục storage/app/public/images và lấy đường dẫn
        $imagePath = $request->file('image')->store('images', 'public');
        
        // Thêm đường dẫn ảnh vào mảng $data
        $data['image'] = $imagePath;
        }

        // Lưu dữ liệu vào database
        Category::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image_path' => $data['image'] ?? null, // Nếu có hình ảnh, lưu đường dẫn, nếu không có thì null
        ]);

        // Quay lại trang danh sách category với thông báo thành công
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }
    public function show(Category $category)
    {
        return view('categories.show', [
            'category' => $category
        ]);
    }
    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category
        ]);
    }
    public function update(StoreCategoryRequest $request, Category $category)
    {
        // Lấy dữ liệu đã được xác thực từ request
        $data = $request->validated();

        // Kiểm tra xem có file hình ảnh mới được tải lên không
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Xóa hình ảnh cũ nếu có
            if ($category->image_path && file_exists(storage_path('app/public/' . $category->image_path))) {
                unlink(storage_path('app/public/' . $category->image_path));
            }

        // Lưu hình ảnh mới
        $imagePath = $request->file('image')->store('images', 'public');

        // Cập nhật đường dẫn hình ảnh mới vào dữ liệu
        $data['image_path'] = $imagePath;
        }

        // Cập nhật dữ liệu vào cơ sở dữ liệu
        $category->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'image_path' => $data['image_path'] ?? $category->image_path, // Giữ nguyên hình ảnh cũ nếu không có ảnh mới
        ]);

        // Quay lại danh sách với thông báo thành công
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }
    public function destroy(Category $category)
    {
         // Kiểm tra xem hình ảnh có tồn tại không và xóa nó
        if ($category->image_path && file_exists(storage_path('app/public/' . $category->image_path))) 
        {
            unlink(storage_path('app/public/' . $category->image_path));
        }

        // Xóa dữ liệu category khỏi database
        $category->delete();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('categories.create',['pages' => Page::all()]);
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
          // Tạo slug từ title
        $slug = Str::slug($data['name']);

        // Đảm bảo slug là duy nhất (nếu cần)
        if (Category::where('slug', $slug)->exists()) {
        $slug .= '-' . time(); // Thêm timestamp để tránh trùng slug
    }

        // Lưu dữ liệu vào database
        Category::create([
            'name' => $data['name'],
            'slug' => $slug, // Thêm slug vào đây
            'description' => $data['description'],
            'page_id' => $data['page_id'],
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
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('categories.edit', [
            'category' => $category,
            'pages'=>Page::all()
        ]);
    }
    public function update(StoreCategoryRequest $request, Category $category)
{
    // Lấy dữ liệu đã được xác thực từ request
    $data = $request->validated();

    // Kiểm tra xem có file hình ảnh không và xử lý
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Xóa file ảnh cũ nếu có
        if ($category->image_path && Storage::disk('public')->exists($category->image_path)) {
            Storage::disk('public')->delete($category->image_path);
        }

        // Lưu file mới vào thư mục storage/app/public/images và lấy đường dẫn
        $imagePath = $request->file('image')->store('images', 'public');

        // Thêm đường dẫn ảnh mới vào mảng $data
        $data['image'] = $imagePath;
    }

    // Cập nhật slug nếu tên thay đổi
    if ($data['name'] !== $category->name) {
        $slug = Str::slug($data['name']);

        // Đảm bảo slug là duy nhất
        if (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
            $slug .= '-' . time();
        }

        $data['slug'] = $slug;
    }

    // Cập nhật dữ liệu vào database
    $category->update([
        'name' => $data['name'],
        'slug' => $data['slug'] ?? $category->slug, // Giữ nguyên slug nếu không thay đổi tên
        'description' => $data['description'],
        'page_id' => $data['page_id'],
        'image_path' => $data['image'] ?? $category->image_path, // Giữ nguyên đường dẫn ảnh cũ nếu không có ảnh mới
    ]);

    // Quay lại trang danh sách category với thông báo thành công
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

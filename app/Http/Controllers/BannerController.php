<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-banner|edit-banner|delete-banner', ['only' => ['index','show']]);
        $this->middleware('permission:create-banner', ['only' => ['create','store']]);
        $this->middleware('permission:edit-banner', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-banner', ['only' => ['destroy']]);
     }
    
     public function index()
     {
        return view('settings.banners.index',['banners'=>Banner::paginate(10)]);
     }
     public function create()
     {
        return view('settings.banners.create');
     }
     public function store(StoreBannerRequest $request)
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
         Banner::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'img_path' => $data['image'] ?? null, // Nếu có hình ảnh, lưu đường dẫn, nếu không có thì null
         ]);

         // Quay lại trang danh sách banner với thông báo thành công
         return redirect()->route('banners.index')->with('success', 'Banner created successfully!');
     }
     public function edit(Banner $banner)
     {
      return view('settings.banners.edit', [
         'banner' => $banner
     ]);
     }
    public function update(StoreBannerRequest $request, Banner $banner)
    {
      // Lấy dữ liệu đã được xác thực từ request
      $data = $request->validated();

      // Kiểm tra xem có file hình ảnh mới được tải lên không
      if ($request->hasFile('image') && $request->file('image')->isValid()) {
      // Xóa hình ảnh cũ nếu có
      if ($banner->image_path && file_exists(storage_path('app/public/' . $banner->image_path))) {
        unlink(storage_path('app/public/' . $banner->image_path));
         }

      // Lưu hình ảnh mới
      $imagePath = $request->file('image')->store('images', 'public');

      // Cập nhật đường dẫn hình ảnh mới vào dữ liệu
      $data['img_path'] = $imagePath;
      }

      // Cập nhật dữ liệu vào cơ sở dữ liệu
      $banner->update([
         'name' => $data['name'],
         'description' => $data['description'],
         'img_path' => $data['img_path'] ?? $banner->img_path, // Giữ nguyên hình ảnh cũ nếu không có ảnh mới
      ]);

      // Quay lại danh sách với thông báo thành công
      return redirect()->route('banners.index')->with('success', 'banner updated successfully!');
    }
     public function show(Banner $banner)
     {
      return view('settings.banners.show', [
         'banner' => $banner
     ]);
     }
     public function destroy(Banner $banner)
     {
          // Kiểm tra xem hình ảnh có tồn tại không và xóa nó
        if ($banner->img_path && file_exists(storage_path('app/public/' . $banner->img_path))) 
        {
            unlink(storage_path('app/public/' . $banner->img_path));
        }

        // Xóa dữ liệu banner khỏi database
        $banner->delete();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('banners.index')->with('success', 'banner deleted successfully!');
     }
}

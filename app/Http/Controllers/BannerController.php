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

         // Quay lại trang danh sách category với thông báo thành công
         return redirect()->route('banners.index')->with('success', 'Banner created successfully!');
     }
     public function edit()
     {

     }
    public function update()
    {

    }
     public function show()
     {

     }
     public function destroy()
     {

     }
}

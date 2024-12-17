<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    protected $partners;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-partner|edit-partner|delete-partner', ['only' => ['index','show']]);
        $this->middleware('permission:create-partner', ['only' => ['create','store']]);
        $this->middleware('permission:edit-partner', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-partner', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('settings.partners.index',['partners'=>Partner::latest()->paginate(10)]);
    }
    public function create()
    {
        return view('settings.partners.create');
    }
    public function store(StorePartnerRequest $request)
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
         Partner::create([
             'name' => $data['name'],
             'description' => $data['description'],
             'img_path' => $data['image'] ?? null, // Nếu có hình ảnh, lưu đường dẫn, nếu không có thì null
         ]);
 
         // Quay lại trang danh sách partner với thông báo thành công
         return redirect()->route('partners.index')->with('success', 'Partner created successfully!');
    }
    public function edit(Partner $partner)
    {
        return view('settings.partners.edit',['partner' => $partner]);
    }
    public function update(StorePartnerRequest $request, Partner $partner)
    {
       // Lấy dữ liệu đã được xác thực từ request
       $data = $request->validated();

       // Kiểm tra xem có file hình ảnh mới được tải lên không
       if ($request->hasFile('image') && $request->file('image')->isValid()) {
       // Xóa hình ảnh cũ nếu có
           if ($partner->img_path && file_exists(storage_path('app/public/' . $partner->img_path))) {
               unlink(storage_path('app/public/' . $partner->img_path));
           }

       // Lưu hình ảnh mới
       $imagePath = $request->file('image')->store('images', 'public');

       // Cập nhật đường dẫn hình ảnh mới vào dữ liệu
       $data['img_path'] = $imagePath;
       }

       // Cập nhật dữ liệu vào cơ sở dữ liệu
       $partner->update([
           'name' => $data['name'],
           'description' => $data['description'],
           'img_path' => $data['img_path'] ?? $partner->img_path, // Giữ nguyên hình ảnh cũ nếu không có ảnh mới
       ]);

       // Quay lại danh sách với thông báo thành công
       return redirect()->route('partners.index')->with('success', 'partner updated successfully!');
    }
    public function show(Partner $partner)
    {
        return view('settings.partners.show', [
            'partner' => $partner
        ]);
    }
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index')
                ->withSuccess('Partner deleted successfully.');
    }
}

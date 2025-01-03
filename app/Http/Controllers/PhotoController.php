<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePhotoRequest;

class PhotoController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-photo|edit-photo|delete-photo', ['only' => ['index','show']]);
       $this->middleware('permission:create-photo', ['only' => ['create','store']]);
       $this->middleware('permission:edit-photo', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-photo', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('photos.index',['photos'=>Photo::paginate(10)]);
    }
    public function create()
    {
        return view('photos.create',['albums'=>Album::all()]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'album_id' => [
                'nullable',
                Rule::in(array_merge(['new'], Album::pluck('id')->toArray())),
            ],
            'name' => 'required|required_if:album_id,new|string|max:255',
        ]);

        // Xử lý tạo album mới nếu được yêu cầu
        $albumId = $request->album_id;

        DB::transaction(function () use ($request, &$albumId) {
            if ($albumId === 'new') {
                $newAlbum = Album::create([
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                ]);
                $albumId = $newAlbum->id;
            }
        
            $photoPath = $request->file('photo')->store('images', 'public');
            Photo::create([
                'url' => $photoPath,
                'album_id' => $albumId,
            ]);
        });

        return redirect()->back()->with('success', 'Ảnh đã được tải lên thành công!')->with('album', $albumId);
    }
}
    

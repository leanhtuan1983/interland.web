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
        $albumId = $request->album_id; 
        if ($albumId == 'new') { 
            $album = Album::create([
                'name' => $request->new_album,
                'slug' => Str::slug($request->name . '-' . uniqid()),
                ]); 
            $albumId = $album->id; 
        } 
        if ($request->hasFile('photo')) { 
            $path = $request->file('photo')->store('images', 'public'); 
            Photo::create([ 'album_id' => $albumId, 'url' => $path, ]); 
        } 
        return redirect()->route('photos.index')->with('success', 'Photo uploaded successfully!');
    }
}
    

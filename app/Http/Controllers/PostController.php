<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-post|edit-post|delete-post', ['only' => ['index','show']]);
       $this->middleware('permission:create-post', ['only' => ['create','store']]);
       $this->middleware('permission:edit-post', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-post', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $pages = Page::all();
        return view('posts.create',compact('categories','pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //   Get validated data
        $data = $request->validated();

        // Handle image upload if present
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store('images', 'public');
            }

        // Create a new post
        Post::create([
            'title' => $data['title'],
            'summary' => $data['summary'],
            'category_id' => $data['category_id'],
            'page_id' => $data['page_id'],
            'content' => $data['content'],
            'author' => Auth::user()->name, // Current logged-in user's name
            'img_path' => $data['image'] ?? null, // Save image path if available
            ]);
    
        // Redirect with success message
        return redirect()->route('posts.index')->with('success', 'New post added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->back()
                ->withSuccess('Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
                ->withSuccess('Product is deleted successfully.');
    }
}

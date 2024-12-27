<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Category;
use Illuminate\Http\Request;

class FeIndexController extends Controller
{
    protected $partner;
    protected $fields;
    protected $projects;
    protected $fieldItems;
    protected $projectItems;
    protected $typicalFields;
    protected $typicalProjects;
    protected $posts;
    public function __construct() {
        $this->partner = Partner::all();
        $this->fields = Category::where('page_id',1)->get();
        $this->projects = Category::where('page_id',2)->get();
        $this->fieldItems = Post::with('categories')->where('page_id', 1)->get()->groupBy('categories.name');
        $this->projectItems = Post::with('categories')->where('page_id', 2)->get()->groupBy('categories.name');
        $this->typicalFields = Post::where('page_id',1)->where('category_id',6)->take(6)->get();
        $this->typicalProjects = Post::where('page_id',2)->where('category_id',8)->take(6)->get();
    }
    public function index()
    {
        return view('fe-pages.index', [
            'banners' => Banner::all(),
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields
        ]);
    }
    public function introduce()
    {
        return view('fe-pages.introduce', [
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields
        ]);
    }
    public function showAllField()
    {
        return view('fe-pages.field',[
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'fieldItems' => $this->fieldItems,
            'typicalFields' => $this->typicalFields
        ]);
    }
    public function showCategoryField($slug)
    {
          // Tìm category bằng slug
            $category = Category::where('slug', $slug)->firstOrFail(); 

            // Lấy ID của category
            $cate_id = $category->id;

            // Truy vấn các bài viết theo category_id
            $posts = Post::where('category_id', $cate_id)->get();
        return view('fe-pages.categoryField',[
            'partners' => $this->partner,
            'typicalProjects' => $this->typicalProjects,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'posts' => $posts,
            'category' => $category
        ]);
    }
    public function showAllProject()
    {
        return view('fe-pages.project',[
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'fieldItems' => $this->fieldItems,
            'projectItems' => $this->projectItems,
            'typicalProjects' => $this->typicalProjects
        ]);
    }
    public function viewFieldItemPost(Post $post)
    {
        $excludedPosts = Post::where('category_id',$post->category_id)->where('slug', '!=', $post->slug)->pluck('title');
        return view('fe-pages.fieldItemPost', [
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'fieldItems' => $this->fieldItems,
            'projectItems' => $this->projectItems,
            'typicalProjects' => $this->typicalProjects,
            'typicalFields' => $this->typicalFields,
            'excludedPosts' => $excludedPosts,
            'post' => $post,
        ]);
    }
    public function viewCostumer()
    {
        return view('fe-pages.view-costumer',[
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'fieldItems' => $this->fieldItems,
            'projectItems' => $this->projectItems,
            'typicalProjects' => $this->typicalProjects,
            'typicalFields' => $this->typicalFields,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Album;
use App\Models\Photo;
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
    protected $footerPosts;
    protected $news;
    protected $footerNews;
    public function __construct() {
        $this->partner = Partner::all();
        $this->fields = Category::where('page_id',1)->get();
        $this->projects = Category::where('page_id',2)->get();
        $this->fieldItems = Post::with('categories')->where('page_id', 1)->get()->groupBy('categories.name');
        $this->projectItems = Post::with('categories')->where('page_id', 2)->get()->groupBy('categories.name');
        $this->typicalFields = Post::where('page_id',1)->where('category_id',6)->take(6)->get();
        $this->typicalProjects = Post::where('page_id',2)->where('category_id',8)->take(6)->get();
        $this->footerPosts = Post::where('category_id',8)->take(4)->get();
        $this->footerNews = Post::where('category_id',14)->take(4)->get();
        $this->news = Post::where('category_id',14)->paginate(10);
    }

    // Hiển thị homepage
    public function index()
    {
        return view('fe-pages.index', [
            'banners' => Banner::all(),
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'footerPosts' => $this->footerPosts,
            'footerNews' =>$this->footerNews
        ]);
    }

    // Hiển thị trang giới thiệu
    public function introduce()
    {
        return view('fe-pages.introduce', [
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'footerPosts' => $this->footerPosts,
            'footerNews' =>$this->footerNews
        ]);
    }

    // Hiển thị trang Lĩnh vực hoạt động
    public function showAllField()
    {
        return view('fe-pages.field',[
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'fieldItems' => $this->fieldItems,
            'typicalFields' => $this->typicalFields,
            'footerPosts' => $this->footerPosts,
            'footerNews' =>$this->footerNews
        ]);
    }

    // Hiển thị bài viết theo category trong Lĩnh vực hoạt động
    public function showCategoryField($slug)
    {
        // Tìm category bằng slug
        $category = Category::where('slug', $slug)->firstOrFail(); 

        // Lấy ID của category
        $cate_id = $category->id;

        // Truy vấn các bài viết theo category_id
        $posts = Post::where('category_id', $cate_id)->Paginate(6);
        return view('fe-pages.categoryField',[
            'partners' => $this->partner,
            'typicalProjects' => $this->typicalProjects,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'typicalFields' => $this->typicalFields,
            'posts' => $posts,
            'category' => $category,
            'footerPosts' => $this->footerPosts,
            'footerNews' =>$this->footerNews
        ]);
    }

    // Hiển thị một bài viết trang Lĩnh vực hoạt động
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
            'footerPosts' => $this->footerPosts,
            'footerNews' =>$this->footerNews
        ]);
    }

    
    // Hiển thị trang Dự án
    public function showAllProject()
    {
        return view('fe-pages.project',[
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'fieldItems' => $this->fieldItems,
            'projectItems' => $this->projectItems,
            'typicalProjects' => $this->typicalProjects,
            'footerPosts' => $this->footerPosts,
            'footerNews' =>$this->footerNews
        ]);
    }

    // Hiển thị bài viết theo category của trang Dự án
    public function showCategoryProject($slug)
    {
          // Tìm category bằng slug
          $category = Category::where('slug', $slug)->firstOrFail(); 

          // Lấy ID của category
          $cate_id = $category->id;

          // Truy vấn các bài viết theo category_id
          $posts = Post::where('category_id', $cate_id)->paginate(6);
      return view('fe-pages.categoryProject',[
          'partners' => $this->partner,
          'typicalProjects' => $this->typicalProjects,
          'projects' => $this->projects,
          'fields' => $this->fields,
          'typicalFields' => $this->typicalFields,
          'posts' => $posts,
          'category' => $category,
          'footerPosts' => $this->footerPosts,
          'footerNews' =>$this->footerNews
      ]);

    }

    // Hiển thị bài viết thuộc trang Dự án

    public function viewProjectItemPost(Post $post)
    {
        $excludedPosts = Post::where('category_id',$post->category_id)->where('slug', '!=', $post->slug)->pluck('title');
        return view('fe-pages.projectItemPost', [
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'fieldItems' => $this->fieldItems,
            'projectItems' => $this->projectItems,
            'typicalProjects' => $this->typicalProjects,
            'typicalFields' => $this->typicalFields,
            'excludedPosts' => $excludedPosts,
            'post' => $post,
            'footerPosts' => $this->footerPosts,
            'footerNews' =>$this->footerNews
        ]);
    }

    // Hiển thị trang Khách hàng
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
            'footerPosts' => $this->footerPosts,
            'footerNews' =>$this->footerNews
        ]);
    }
    public function gallery()
    {
       
        $albumsWithPhoto = Album::select('albums.*')
            ->addSelect(['photo_url' => Photo::select('url')
            ->whereColumn('album_id', 'albums.id')
            ->limit(1) // Lấy một ảnh duy nhất
        ])
        ->get();

        return view('fe-pages.gallery',[
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'albumsWithPhoto' => $albumsWithPhoto,
            'footerPosts' => $this->footerPosts,
            'footerNews' =>$this->footerNews
        ]);
    }
    public function showAlbum($slug) 
    {
        $album = Album::where('slug',$slug) -> firstOrFail();
        // Lấy ID của category
        $album_id = $album->id;

        // Truy vấn các bài viết theo category_id
        $photos = Photo::where('album_id', $album_id)->get();
        return view('fe-pages.showAlbum',[
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'photos' => $photos, 
            'album' => $album,
            'footerPosts' => $this->footerPosts,
            'footerNews' =>$this->footerNews
        ]);
    }

    public function showContact()
    {
        return view('fe-pages.contact',[
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'footerPosts' => $this->footerPosts,
            'footerNews' =>$this->footerNews
        ]);
    }
    public function showNewsList()
    {
        return view('fe-pages.newslist',[
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'typicalProjects' => $this->typicalProjects,
            'typicalFields' => $this->typicalFields,
            'footerPosts' => $this->footerPosts,
            'news' => $this->news,
            'footerNews' =>$this->footerNews
        ]);
    }
    public function showItemNews(Post $post)
    {       
        $excludedNews = Post::where('category_id',$post->category_id)->where('slug', '!=', $post->slug)->pluck('title');
        return view('fe-pages.showItemNews',[
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'typicalProjects' => $this->typicalProjects,
            'typicalFields' => $this->typicalFields,
            'footerPosts' => $this->footerPosts,
            'news' => $this->news,
            'excludedNews' => $excludedNews,
            'post' => $post,
            'footerNews' =>$this->footerNews
        ]);
    }
    public function recruitment()
    {
        return view('fe-pages.recruitment');
    }
    public function recruitmentItem(Post $post)
    {
        return view('fe-pages.recruitmentItem');
    }
}

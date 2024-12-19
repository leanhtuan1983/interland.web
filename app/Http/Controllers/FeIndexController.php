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
    public function __construct() {
        $this->partner = Partner::all();
        $this->fields = Category::where('page_id',1)->get();
        $this->projects = Category::where('page_id',2)->get();
        $this->fieldItems = Post::with('categories')->where('page_id', 1)->get()->groupBy('categories.name');

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
            'banners' => Banner::all(),
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields
        ]);
    }
    public function showAllField()
    {
        return view('fe-pages.field',[
            'banners' => Banner::all(),
            'partners' => $this->partner,
            'projects' => $this->projects,
            'fields' => $this->fields,
            'fieldItems' => $this->fieldItems
        ]);
    }
}

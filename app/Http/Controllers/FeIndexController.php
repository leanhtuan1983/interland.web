<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Partner;
use Illuminate\Http\Request;

class FeIndexController extends Controller
{
    protected $partner;
    public function __construct() {
        $this->partner = Partner::all();
    }
    public function index()
    {
        return view('fe-pages.index',['banners'=>Banner::all()])->with('partners',$this->partner);
    }
    public function introduce()
    {
        return view('fe-pages.introduce')->with('partners',$this->partner);
    }
}

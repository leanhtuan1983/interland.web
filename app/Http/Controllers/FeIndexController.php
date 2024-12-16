<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class FeIndexController extends Controller
{
    public function index()
    {
        return view('fe-pages.index',['banners'=>Banner::all()]);
    }
}

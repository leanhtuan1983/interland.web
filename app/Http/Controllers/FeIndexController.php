<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeIndexController extends Controller
{
    public function index()
    {
        return view('fe-pages.index');
    }
}

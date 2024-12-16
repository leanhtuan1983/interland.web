<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:index-settings',['only' => ['index']]);
    }
    public function index()
    {
        return view('settings.index');
    } 
}

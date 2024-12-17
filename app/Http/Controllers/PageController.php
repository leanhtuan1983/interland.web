<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\StorePageRequest;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-page|edit-page|delete-page', ['only' => ['index','show']]);
        $this->middleware('permission:create-page', ['only' => ['create','store']]);
        $this->middleware('permission:edit-page', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-page', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('pages.index',[
            'pages'=>Page::latest()->paginate(5)]);
    }
    public function create()
    {
        return view('pages.create');
    }
    public function store(StorePageRequest $request)
    {
        Page::create($request->all());
        return redirect()->route('pages.index')
                ->withSuccess('New page added successfully.');
    }
    public function edit(Page $page)
    {
        return view('pages.edit', [
            'page' => $page
        ]);
    }
    public function show(Page $page)
    {
        return view('pages.show', [
            'page' => $page
        ]);
    }
    public function update(StorePageRequest $request, Page $page)
    {
        $page->update($request->all());
        return redirect()->back()
                ->withSuccess('Page updated successfully.');
    }
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index')
                ->withSuccess('Page deleted successfully.');
    }
}

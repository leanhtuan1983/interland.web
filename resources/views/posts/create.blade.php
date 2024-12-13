@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Post
                </div>
                <div class="float-end">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="title" class="col-md-2 col-form-label text-md-end text-start">Title</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="category_id" class="col-md-2 col-form-label text-md-end text-start">Category</label>
                        <div class="col-md-9">
                          <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="page_id" class="col-md-2 col-form-label text-md-end text-start">Page</label>
                        <div class="col-md-9">
                          <select name="page_id" id="page_id" class="form-control">
                            @foreach ($pages as $page)
                                <option value="{{ $page->id }}">{{ $page->name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="image" class="col-md-2 col-form-label text-md-end text-start">Image</label>
                        <div class="col-md-9">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="summary" class="col-md-2 col-form-label text-md-end text-start">Summary</label>
                        <div class="col-md-9">
                        <textarea class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary">{{ old('summary') }}</textarea>
                            @if ($errors->has('summary'))
                                <span class="text-danger">{{ $errors->first('summary') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="content" class="col-md-2 col-form-label text-md-end text-start">Content</label>
                        <div class="col-md-9">
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content') }}</textarea>
                            @if ($errors->has('content'))
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Post">
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection

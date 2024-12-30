@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">Edit Post</div>
                <div class="float-end">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <!-- Title -->
                    <div class="mb-3 row">
                        <label for="title" class="col-md-2 col-form-label text-md-end text-start">Title</label>
                        <div class="col-md-9">
                            <input type="text" name="title" id="title" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title', $post->title) }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="mb-3 row">
                        <label for="summary" class="col-md-2 col-form-label text-md-end text-start">Summary</label>
                        <div class="col-md-9">
                            <textarea name="summary" id="summary" 
                                      class="form-control @error('summary') is-invalid @enderror" 
                                      rows="3">{{ old('summary', $post->summary) }}</textarea>
                            @error('summary')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="mb-3 row">
                        <label for="category_id" class="col-md-2 col-form-label text-md-end text-start">Category</label>
                        <div class="col-md-9">
                            <select name="category_id" id="category_id" 
                                    class="form-control @error('category_id') is-invalid @enderror">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Page -->

                    <div class="mb-3 row">
                        <label for="page_id" class="col-md-2 col-form-label text-md-end text-start">Page</label>
                        <div class="col-md-9">
                            <select name="page_id" id="page_id" 
                                    class="form-control @error('page_id') is-invalid @enderror">
                                @foreach ($pages as $page)
                                    <option value="{{ $page->id }}" 
                                        {{ old('page_id', $post->page_id) == $page->id ? 'selected' : '' }}>
                                        {{ $page->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('page_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Image -->
                    <div class="mb-3 row">
                        <label for="image" class="col-md-2 col-form-label text-md-end text-start">Image</label>
                        <div class="col-md-9">
                            <input type="file" name="image" id="image" 
                                   class="form-control @error('image') is-invalid @enderror">
                            @if ($post->img_path)
                                <small class="text-muted">Current Image: {{ $post->img_path }}</small>
                            @endif
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="mb-3 row">
                        <label for="content" class="col-md-2 col-form-label text-md-end text-start">Content</label>
                        <div class="col-md-9">
                            <textarea name="content" id="content" 
                                      class="form-control @error('content') is-invalid @enderror" 
                                      rows="5">{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3 row">
                        <div class="col-md-9 offset-md-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    tinymce.init({
        selector: 'textarea#content', // ID của textarea
        plugins: 'image link media table code',
        toolbar: 'undo redo | styleselect | bold italic | link image media | code',
        file_picker_callback: function(callback, value, meta) {
            let cmsURL = '/laravel-filemanager?editor=' + meta.fieldname; // URL Laravel File Manager
            tinymce.activeEditor.windowManager.openUrl({
                title: 'Laravel File Manager',
                url: cmsURL,
                width: 900,
                height: 600,
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    });
</script>  
@endsection

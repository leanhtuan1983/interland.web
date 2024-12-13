@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Product
                </div>
                <div class="float-end">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('posts.update', $post->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="title" class="col-md-2 col-form-label text-md-end text-start">Title</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $post->title }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="author" class="col-md-2 col-form-label text-md-end text-start">Posted by</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ $post->author }}" disabled>
                            @if ($errors->has('author'))
                                <span class="text-danger">{{ $errors->first('author') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editor" class="col-md-2 col-form-label text-md-end text-start">Content</label>
                        <div class="col-md-9">
                            <textarea class="form-control @error('content') is-invalid @enderror" id="editor" name="content">{{ $post->content }}</textarea>
                            @if ($errors->has('content'))
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
<script>
    tinymce.init({
        selector: 'textarea#editor', // ID của textarea
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

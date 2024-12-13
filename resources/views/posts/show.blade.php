@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Content of {{ $post->title}}
                </div>
                <div class="float-end">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="title" class="col-md-4 col-form-label text-md-end text-start"><strong>Title:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $post->title }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="posted_at" class="col-md-4 col-form-label text-md-end text-start"><strong>Posted at:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $post->created_at }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="posted_by" class="col-md-4 col-form-label text-md-end text-start"><strong>Posted by:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $post->author }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="category" class="col-md-4 col-form-label text-md-end text-start"><strong>Category:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $post->categories->name }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="page" class="col-md-4 col-form-label text-md-end text-start"><strong>Page view:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $post->pages->name }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="summary" class="col-md-4 col-form-label text-md-end text-start"><strong>Summary:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $post->summary }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="content" class="col-md-4 col-form-label text-md-end text-start"><strong>Content:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {!! $post->content !!}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection

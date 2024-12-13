@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Product Information
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
                        <label for="content" class="col-md-4 col-form-label text-md-end text-start"><strong>Content:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $post->content }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection

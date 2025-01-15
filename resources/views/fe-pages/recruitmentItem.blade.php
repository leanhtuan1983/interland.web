<!-- Hiển thị 1 bài viết của trang Tin tức -->
@extends('fe-pages.layouts.app')
@section('title',$post->title)
@section('content')
<div class="container-fluid d-flex justify-content-center text-white mybreadcrumb">
    <div class="container d-flex justify-content-start text-white" style="width:1100px; height:102px;">
    <h3 class="my-auto">{{ $post->categories->name }}</h3>
    </div>
</div>
<div class="container justify-content-center" style="width:1100px;" >
    <div class="d-flex justify-content-between">
        <div class="col-9 mt-4">
            <h4>{{ $post -> title }}</h4>
            <p class="text-black-50"><i class="bi bi-person me-2"></i>{{ $post -> author }} | 
            <a class="text-decoration-none text-black-50"  href="{{ route('recruitment') }}"><i class="bi bi-bookmark me-2"></i>Tuyển dụng</a> | | 
            <i class="bi bi-clock me-2"></i>{{ Carbon\Carbon::parse($post->created_at)->isoFormat('dddd, D/M/YYYY') }} | 
            {{ Carbon\Carbon::parse($post->created_at)->format('h:m') }}
        </p>
        <button class="btn btn-primary btn-sm border-rounded me-2"><i class="bi bi-facebook ms-3 me-3"></i></button>
        <button class="btn btn-dark btn-sm border-rounded me-2"><i class="bi bi-twitter-x ms-3 me-3"></i></button>
        <button class="btn btn-danger btn-sm border-rounded me-2"><i class="bi bi-pinterest ms-3 me-3"></i></button>
        <button class="btn btn-dark btn-sm border-rounded me-2"><i class="bi bi-threads ms-3 me-3"></i>  </button>
          <div class="mt-4 mb-5">
          {!! $post->content !!}
          </div> 
        <button class="btn btn-primary btn-sm border-rounded me-2"><i class="bi bi-facebook ms-3 me-3"></i></button>
        <button class="btn btn-dark btn-sm border-rounded me-2"><i class="bi bi-twitter-x ms-3 me-3"></i></button>
        <button class="btn btn-danger btn-sm border-rounded me-2"><i class="bi bi-pinterest ms-3 me-3"></i></button>
        <button class="btn btn-dark btn-sm border-rounded me-2"><i class="bi bi-threads ms-3 me-3"></i>  </button> 
        <div class="mt-5">
            <h5>Các tin tức khác</h5>
            <ul>
                @foreach ($excludedNews as $title)
                <li><a href="{{ route('viewFieldItemPost', ['post' => Str::slug($title)]) }}" class="text-decoration-none text-dark">{{ $title }}</a></li>
                @endforeach
            </ul>
        </div>
        </div>
        <div class="col-3 d-block mt-4">
            @include('fe-pages.partials.projectItem-sidebar')
        </div>
    </div> 
</div>
@endsection
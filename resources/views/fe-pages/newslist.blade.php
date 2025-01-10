<!-- Hiển thị các bài viết có cùng 1 category trong trang Lĩnh vực hoạt động -->
@extends('fe-pages.layouts.app')
@section('title', config('pages.news') )

@section('content')
<div class="tophead container-fluid d-flex justify-content-center text-white mybreadcrumb">
    <div class="container d-flex justify-content-start text-white" style="width:1100px; height:102px;">
        <h3 class="my-auto">Tin tức</h3>
    </div>
</div>

<div class="content container justify-content-center" style="width:1100px;">
    <div class="content row d-flex justify-content-between">
        <div class="col-9 mt-4">
            @foreach ($news as $new)
            <div class="d-flex mt-4 border-bottom border-black-50">
                <img class="img-fluid mb-4" src="{{ url('storage/'.$new->img_path) }}" alt="" style="width:218px; height:auto; object-fit:cover;">
                <div class="ms-4">
                    <a class="text-decoration-none text-dark h4" href="{{ route('showItemNews',$new->slug) }}">{{ $new->title }}</a>
                    <p class="text-black-50">
                        <i class="bi bi-person me-2"></i>{{ $new -> author }} | 
                        <a class="text-decoration-none text-black-50"  href="{{ route('showNewsList') }}"><i class="bi bi-bookmark me-2"></i>{{ $new -> categories -> name }}</a> | 
                        <i class="bi bi-clock me-2"></i>{{ Carbon\Carbon::parse($new->created_at)->isoFormat('dddd, D/M/YYYY') }} | 
                        {{ Carbon\Carbon::parse($new->created_at)->format('h:m') }}
                    </p>
                    <p>{{ Str::words($new->summary, 50, '...') }}</p>
                    <div class="mb-2">
                        <a class="text-decoration-none" style="color: rgb(99,35,111);" href="#">Chi tiết...</a>
                    </div>
                    
                </div>      
            </div>   
            @endforeach
             <!-- Hiển thị nút phân trang -->
             <div class="mt-4 mb-2">
                {{ $news->links() }}
            </div>
        </div>
        <div class="col-3 d-block mt-4">
            @include('fe-pages.partials.project-category-sidebar')
        </div>
    </div>
</div>

@endsection
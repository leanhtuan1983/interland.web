<!-- Hiển thị các bài viết có cùng 1 category trong trang Lĩnh vực hoạt động -->
@extends('fe-pages.layouts.app')
@section('title', $category->name )

@section('content')
<div class="tophead container-fluid d-flex justify-content-center text-white mybreadcrumb">
    <div class="container d-flex justify-content-start text-white" style="width:1100px; height:102px;">
        <h3 class="my-auto">{{ $category -> name }}</h3>
    </div>
</div>

<div class="content container justify-content-center" style="width:1100px;">
    <div class="content row d-flex justify-content-between">
        <div class="col-9 mt-4">
            @foreach ($posts as $item)
            <div class="d-flex mt-4 border-bottom border-black-50">
                <img class="img-fluid mb-4" src="{{ url('storage/'.$item->img_path) }}" alt="" style="width:30%; height:40%; object-fit:cover;">
                <div class="ms-4">
                    <a class="text-decoration-none text-dark h4" href="{{ route('viewFieldItemPost',$item) }}">{{ $item->title }}</a>
                    <p class="text-black-50">
                        <i class="bi bi-person me-2"></i>{{ $item -> author }} | 
                        <a class="text-decoration-none text-black-50"  href="{{ route('category-field',$item->categories->slug) }}"><i class="bi bi-bookmark me-2"></i>{{ $item -> categories -> name }}</a> | 
                        <i class="bi bi-clock me-2"></i>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D/M/YYYY') }} | 
                        {{ Carbon\Carbon::parse($item->created_at)->format('h:m') }}
                    </p>
                    <p>{{ $item-> summary }}</p>
                    <div class="mb-2">
                        <a class="text-decoration-none" style="color: rgb(99,35,111);" href="{{ route('viewFieldItemPost',$item) }}">Chi tiết...</a>
                    </div>
                    
                </div>      
            </div>   
            @endforeach
             <!-- Hiển thị nút phân trang -->
             <div class="mt-4 mb-2">
                {{ $posts->links() }}
            </div>
        </div>
        <div class="col-3 d-block mt-4">
            @include('fe-pages.partials.field-category-sidebar')
        </div>
    </div>
</div>

@endsection


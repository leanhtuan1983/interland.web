@extends('fe-pages.layouts.app')
@section('title', config('pages.title.field'))

@section('content')
<div class="tophead container-fluid d-flex justify-content-center text-white mybreadcrumb">
    <div class="container d-flex justify-content-start text-white" style="width:1100px; height:102px;">
        <h3 class="my-auto">Lĩnh vực hoạt động</h3>
    </div>
</div>

<div class="content container justify-content-center" style="width:1100px;">
    <div class="content row d-flex justify-content-between">
        <div class="col-9 mt-4">
            @foreach ($fieldItems as $categoryName => $posts)
                @php
                    $category = \App\Models\Category::where('name', $categoryName)->first();
                @endphp
                <div class="row mb-4 border-bottom border-costume">
                    <div class="col-4">
                        @if ($category)
                            <img src="{{ asset('storage/' . $category->image_path) }}" alt="{{ $category->name }}" class="img-thumbnail">
                        @else
                            <img src="{{ asset('path/to/default/image.jpg') }}" alt="No image" class="img-thumbnail">
                        @endif
                    </div>
                    <div class="col-8 mb-4">
                        <div class="card border-0">
                            <div class="card-header bg-body border-0">
                                <p class="h4">{{ $categoryName }}</p>
                            </div>
                            <div class="card-body post-group">
                                @foreach ($posts->take(4) as $post)
                                    <a href="{{ route('viewFieldItemPost', $post) }}" class="text-decoration-none link-dark d-block">
                                        <i class="bi bi-chevron-double-right me-2"></i>{{ $post->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-3 d-block mt-4">
            @include('fe-pages.partials.field-sidebar')
        </div>
    </div>
</div>
@endsection

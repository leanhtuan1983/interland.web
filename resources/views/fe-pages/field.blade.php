@extends('fe-pages.layouts.app')
@section('title',config('pages.title.field'))
@section('content')
<div class="container-fluid d-flex justify-content-center text-white mybreadcrumb">
    <div class="container d-flex justify-content-start text-white" style="width:1100px; height:102px;">
    <h3 class="my-auto">Lĩnh vực hoạt động</h3>
    </div>
</div>
<div class="container" style="width:1100px;">
@foreach ($fieldItems as $categoryName => $posts)
    <div class="card">
        <div class="card-header">
            <p>Category: {{ $categoryName }}</p>
        </div>
        <div class="card-body">
            @foreach ($posts as $post)
                <p>{{ $post->title }}</p>
            @endforeach
        </div>
    </div>
@endforeach
</div>
@endsection
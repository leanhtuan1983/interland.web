@extends('fe-pages.layouts.app')
@section('title', config('pages.title.field'))

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
                <img src="{{ url('storage/'.$item->img_path) }}" alt="" style="width: 216px; height: 90px;">
                <div class="ms-4">
                    <p class="h4">{{ $item -> title }}</p>
                    <p class="text-black-50"><i class="bi bi-person me-2"></i>{{ $item -> author }} | <i class="bi bi-bookmark me-2"></i>{{ $item -> categories -> name }} | <i class="bi bi-clock me-2"></i>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D/M/YYYY') }} | {{ Carbon\Carbon::parse($item->created_at)->format('h:m') }}
                    </p>
                    <p>{!! Str::words($item->content, 30, '...') !!}</p>
                </div>      
            </div>   
            @endforeach
        </div>
        <div class="col-3 d-block mt-4">
            @include('fe-pages.partials.project-sidebar')
        </div>
    </div>
</div>
@endsection


<!-- Trang Khách hàng -->
@extends('fe-pages.layouts.app')
@section('title',config('pages.title.costumer'))
@section('content')
<div class="container-fluid d-flex justify-content-center text-white mybreadcrumb">
    <div class="container d-flex justify-content-start text-white" style="width:1100px; height:102px;">
    <h3 class="my-auto">Khách hàng</h3>
    </div>
</div>
<div class="container-fluid justify-content-center mt-5" style="width:1100px;">
    <div class="row">
        @foreach ($partners as $index => $image)
            <div class="col-3 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $image->img_path) }}" class="card-img-top" alt="{{ $image->name }}">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $image->name }}</h5>
                    </div>
                </div>
            </div>
            @if (($index + 1) % 4 == 0)
                </div><div class="row">
            @endif
        @endforeach
    </div>
</div>
@endsection
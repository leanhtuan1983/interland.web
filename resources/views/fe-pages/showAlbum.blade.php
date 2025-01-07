@extends('fe-pages.layouts.app')
@section('title',config('pages.title.gallery'))
@section('content')
<div class="container-fluid d-flex justify-content-center text-white mybreadcrumb">
    <div class="container d-flex justify-content-start text-white" style="width:1100px; height:102px;">
    <h3 class="my-auto">{{ $album -> name }}</h3>
    </div>
</div>
<div class="container-fluid justify-content-center">
    <div class="container d-block d-lg-flex  justify-content-between mt-5" style="width:1100px;">
        <div class="container">
            <div class="row">
                @foreach ($photos as $index => $photo)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            @if ($photo->url)
                            <a href="#">
                                <img class="img-fluid object-fit-cover" src="{{ asset('storage/' . $photo->url) }}" alt="{{ $photo->albums->name }}" style="width:360px; height:214px">
                            </a>    
                            @else
                                <p>No photo available</p>
                            @endif         
                    </div>
                    <div class="card-header">
                        <p class="h5" style="color: rgb(99,35,111)">{{ $photo->albums -> name }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Kiểm tra để bắt đầu một hàng mới -->
            @if (($index + 1) % 3 == 0)
                </div><div class="row">
            @endif
        @endforeach
    </div>
</div>
    </div>
</div>
@endsection
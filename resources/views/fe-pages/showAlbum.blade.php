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
                            <a href="#" data-bs-toggle="modal" data-bs-target="#photoModal" data-index="{{ $index }}">
                                <img class="img-fluid object-fit-cover" src="{{ asset('storage/' . $photo->url) }}" alt="{{ $photo->albums->name }}" style="width:360px; height:214px">
                            </a>
                        @else
                            <p>No photo available</p>
                        @endif
                        </div>
                        <div class="card-header">
                            <p class="h5" style="color: rgb(99,35,111)">{{ $photo->albums->name }}</p>
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

    <!-- Modal Carousel -->
    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photoModalLabel">{{ $photo->albums->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="carouselPhotos" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($photos as $index => $photo)
                            <div class="carousel-item @if ($index === 0) active @endif">
                                <img class="img-fluid" style="width: 100%; height:auto" src="{{ asset('storage/' . $photo->url) }}" alt="{{ $photo->albums->name }}">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPhotos" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselPhotos" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle modal index -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var photoModal = document.getElementById('photoModal');
            photoModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget; // Button that triggered the modal
                var index = button.getAttribute('data-index'); // Extract index from data-index attribute
                var carousel = document.getElementById('carouselPhotos');
                var carouselInstance = bootstrap.Carousel.getInstance(carousel);
                carouselInstance.to(parseInt(index)); // Move carousel to the selected index
            });
        });
    </script>

    </div>
</div>

@endsection
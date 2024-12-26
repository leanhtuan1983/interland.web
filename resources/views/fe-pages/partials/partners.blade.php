<div class="container bg-white d-flex justify-content-center" style ="width:1294px">
  <div id="multiItemCarousel" class="carousel slide col-10 mt-4 mb-4" data-bs-ride="carousel">
    <div class="carousel-inner">
        @php
            $totalImages = count($partners);
            $imagesPerSlide = 5;
            $repeatImages = $imagesPerSlide - ($totalImages % $imagesPerSlide);
            $displayImages = $partners->concat($partners->take($repeatImages));
        @endphp
         @foreach($displayImages->chunk(5) as $chunk)
            <div class="carousel-item @if($loop->first) active @endif">
                <div class="d-flex justify-content-between">
                    @foreach($chunk as $image)
                        <div class="col">
                            <img src="{{ url('storage/'.$image->img_path) }}" alt="{{ $image->name }}" alt="Image" style="width:170px; height:70px;">
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
  </div>
</div>
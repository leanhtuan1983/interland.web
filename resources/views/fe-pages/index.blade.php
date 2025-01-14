<!-- Trang chủ -->
@extends('fe-pages.layouts.app')
@section('title',config('pages.title.home'))
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-indicators">
      @foreach ($banners as $index => $banner)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
      @endforeach
    </div>
  <div class="carousel-inner">
    @foreach ($banners as $index => $banner)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
          <img src="{{ url('storage/'.$banner->img_path) }}" alt="{{ $banner->name }}" class="d-block w-100">
        </div>
      @endforeach
  </div>
</div>
<div class="container mt-4 d-flex justify-content-between" style="width:1294px;">
    <div class="col-7" style="margin-left:100px">
        <p class="h3 lh-sm">Công ty CP đầu tư công nghệ và địa ốc Interland</p>
        <p class="mt-3">Với đội ngũ nhân sự ưu tú, môi trường làm việc năng động, đề cao giá trị văn hóa doanh nghiệp,<br>theo chúng tôi tự tin sẽ đem đến Khách hàng và Đối tác giá trị tối ưu nhất...</p>
    </div>
    <div class="col-2 d-flex justify-content-end" style="height:80px; margin-right:100px">
      <a class=" ms-2 costume-button-index" href="{{ route('viewIntro',['slug'=>'cong-ty-cp-dau-tu-cong-nghe-va-dia-oc-interland']) }}">Chi tiết<i class="bi bi-chevron-right ms-2"></i></a>
    </div>
</div>
<div class="container mt-2 d-flex justify-content-between" style="width:1294px;background: #e1e1e1">
    <div class="row mt-5 mb-4" style="margin-left:100px; margin-right:100px; font-size:14px;">
      @foreach ($fields as $field)
      <div class="col-3 justify-content-between">
           <img src="{{ url('storage/'.$field->image_path) }}" style="width: 247px; height:156px" alt="">
           <p class="h5 mt-4">{{ $field->name }}</p>
           <p>
           {{ $field -> description }}
           </p> 
           <a href="{{ route('category-field',$field->slug) }}" class="text-decoration-none fw-bold" style="color:rgb(99,35,111);"><strong>Chi tiết</strong><i class="bi bi-chevron-right"></i></a>
        </div>
      @endforeach
       
    </div>
</div>
<div class="container mt-4 d-flex justify-content-between" style="width:1294px;">   
</div>
@endsection
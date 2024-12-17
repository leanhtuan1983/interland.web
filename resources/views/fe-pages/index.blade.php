@extends('fe-pages.layouts.app')
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
        <button type="button" class="btn btn-warning btn-lg text-white mt-4">Chi tiết<i class="bi bi-chevron-right ms-2"></i></button>
    </div>
</div>
<div class="container mt-2 d-flex justify-content-between" style="width:1294px;background: #e1e1e1">
    <div class="row mt-5 mb-4" style="margin-left:100px; margin-right:100px;">
        <div class="col-3 justify-content-between">
           <img src="{{ asset('assets/images/banners/ThuongMai.jpg')}}" style="width: 247px; height:156px" alt="">
           <p class="h5 mt-4">Thương Mại</p>
           <p>
           Chúng tôi tự hào là một trong những doanh nghiệp uy tín...
           </p> 
           <a href="" class="text-decoration-none fw-bold" style="color:blueviolet;">Chi tiết<i class="bi bi-chevron-right"></i></a>
        </div>
        <div class="col-3">
           <img src="{{ asset('assets/images/banners/GTGT.jpg')}}" style="width: 247px; height:156px" alt="">
           <p class="h5 mt-4">Dịch vụ GTGT</p>  
           <p>
           Xuất phát trên xu hướng phát triển viễn thông trong nước và quốc tế cũng như sự phát triển mạnh mẽ của nội...
           </p>
           <a href="" class="text-decoration-none fw-bold" style="color:blueviolet;">Chi tiết<i class="bi bi-chevron-right"></i></a>
        </div>
        <div class="col-3">
           <img src="{{ asset('assets/images/banners/BDS.jpg')}}" style="width: 247px; height:156px" alt=""> 
           <p class="h5 mt-4">Bất Động Sản</p> 
           <p>
           Xuất phát từ mục tiêu tăng cường tính minh bạch cho thị trường bất động sản đồng thời đáp ứng nhu cầu cung cấp...
           </p>
           <a href="" class="text-decoration-none fw-bold" style="color:blueviolet;">Chi tiết<i class="bi bi-chevron-right"></i></a>
        </div>
        <div class="col-3">
           <img src="{{ asset('assets/images/banners/TTVT.jpg')}}" style="width: 247px; height:156px" alt="">
           <p class="h5 mt-4">Trung Tâm Viễn Thông</p> 
           <p>
           Thực tế hiện nay, số lượng các tòa nhà cao ốc, chung cư nhiều tầng, trung tâm thương mại, trụ sở các Tập...
           </p> 
           <a href="" class="text-decoration-none fw-bold" style="color:blueviolet;">Chi tiết<i class="bi bi-chevron-right"></i></a>
        </div>
    </div>
</div>
<div class="container mt-4 d-flex justify-content-between" style="width:1294px;">   
</div>
@endsection
<!-- Chân trang -->
<div class="container-fluid d-flex justify-content-center" style="background:rgb(85,85,85)">
    <div class="container mt-4 text-white d-flex justify-content-between" style="width:1100px;">
        <div class="col-3 p-2">
            <p class="fs-5">Lĩnh vực hoạt động</p>
            <p class="fs-6 fw-light">
            Chúng tôi tự tin sẽ đem đến Khách hàng và Đối tác giá trị tối ưu nhất...
            </p>
            <ul class="list-unstyled">
                <li class="footer-divider pb-1"><a class="text-decoration-none text-white-50" href="http://"><i class="bi bi-chevron-right me-2"></i>Thương mại</a></li>
                <li class="footer-divider pb-1 pt-2"><a class="text-decoration-none text-white-50" href="http://"><i class="bi bi-chevron-right me-2"></i>Dịch vụ GTGT</a></li>
                <li class="footer-divider pb-1 pt-2"><a class="text-decoration-none text-white-50" href="http://"><i class="bi bi-chevron-right me-2"></i>Bất động sản</a></li>
                <li class="footer-divider pb-1 pt-2"><a class="text-decoration-none text-white-50" href="http://"><i class="bi bi-chevron-right me-2"></i>Trung tâm Viễn thông</a></li>
            </ul>
        </div>
        <div class="col-3 p-2">
            <p class="fs-5">Dự án của chúng tôi</p>
            <ul class="list-unstyled">
            @foreach ($footerPosts as $footerPost ) 
                <li class="pt-2 footer-divider"><a class="text-decoration-none text-white-50" href="{{ route('showItemNews',$footerPost->slug) }}">{{ $footerPost->title }}</a>
                <p class="mb-1 text-white-50">{{ Carbon\Carbon::parse($footerPost->created_at)->format('d/m/y')}}</p>
            </li>
                
            @endforeach
            </ul>
        </div>
        <div class="col-3 p-2">
            <p class="fs-5">Tin tức & Sự kiện</p>
            <ul class="list-unstyled">
            @foreach ($footerNews as $footerNew )
            <div class="d-flex footer-divider">
                <img class="mb-2 mt-2" src="{{ url('storage/'.$footerNew->img_path) }}" alt="" style="width:82px; height:auto;">
                <li class="pt-2 pb-2 ps-2"><a class="text-decoration-none text-white-50" href="{{ route('showItemNews',$footerNew->slug) }}">{{ $footerNew->title }}</a></li>
            </div>
            @endforeach
            </ul>
        </div>
        <div class="col-3 p-2">
            <p class="fs-5">Liên hệ với chúng tôi</p>
            <strong>Địa chỉ</strong></br> Toà nhà JoyHouse, Lô B2/D21 Khu ĐTM Cầu Giấy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội</br>
            <strong>Số điện thoại</strong></br>+84.24 6257 6789</br>
            <strong>Fax</strong></br>+84.24 6257 6789</br>
            <strong>Email</strong></br>info@interland.vn
            </p>
        </div>
    </div>  
</div>
<div class="container-fluid d-flex justify-content-center bg-dark text-white-50">
    <div class="col-10 d-flex justify-content-center">
        <p class ="pt-3">Bản quyền bởi Interland. Tất cả dữ liệu và hình ảnh</p>  
    </div> 
</div>
    
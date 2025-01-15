<!-- Chân trang -->
 <style>
    .image-wrapper-footer {
    position: relative;
    width: 82px;
    height: auto;
    overflow: hidden;
}
.image-wrapper-footer img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
}
.image-wrapper-footer .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(37, 35, 37, 0.5); /* Màu tím với độ trong suốt */
    opacity: 0; /* Mặc định ẩn lớp phủ */
    transition: opacity 0.3s ease; /* Hiệu ứng chuyển đổi */
}
.image-wrapper-footer:hover .overlay {
    opacity: 1;
}
 </style>
<div class="container-fluid d-flex justify-content-center" style="background:rgb(85,85,85)">
    <div class="container mt-4 text-white d-block d-md-flex justify-content-between" style="width:1100px;">
        <div class="col-3 p-2">
            <p class="fs-5">Lĩnh vực hoạt động</p>
            <p class="fs-6 fw-light">
            Chúng tôi tự tin sẽ đem đến Khách hàng và Đối tác giá trị tối ưu nhất...
            </p>
            <ul class="list-unstyled">
            @foreach ($fields as $field)
                <li class="footer-divider pb-1 pt-2">
                    <a class="text-decoration-none text-white-50" href="{{ route('category-field',$field->slug) }}"><i class="bi bi-chevron-right"></i>{{ $field->name }}</a>
                </li>
            @endforeach
            </ul>
        </div>
        <div class="col-3 p-2">
            <p class="fs-5">Dự án của chúng tôi</p>
            <ul class="list-unstyled">
            @foreach ($footerPosts as $footerPost ) 
                <li class="pt-2 footer-divider"><a class="text-decoration-none text-white-50" href="{{ route('viewProjectItemPost',$footerPost->slug) }}">{{ $footerPost->title }}</a>
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
                <a href="{{ route('showItemNews',$footerNew->slug) }}">
                    <div class="image-wrapper-footer">
                        <img class="mb-2 mt-2" src="{{ url('storage/'.$footerNew->img_path) }}" alt="">
                        <div class="overlay text-white fs-3">
                            <div class="d-flex justify-content-center mt-3">
                                <i class="bi bi-filter-circle"></i>
                            </div>
                        </div>
                    </div>
                </a>
                <li class="pt-2 pb-2 ps-2"><a class="text-decoration-none text-white-50" href="{{ route('showItemNews',$footerNew->slug) }}">{{ $footerNew->title }}</a></li>
            </div>
            @endforeach
            </ul>
        </div>
        <div class="col-3 p-2">
            <p class="fs-5">Liên hệ với chúng tôi</p>
            <strong>Địa chỉ</strong></br> 
                <span class ="text-white-50">Toà nhà JoyHouse, Lô B2/D21 Khu ĐTM Cầu Giấy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội</span></br>
            <strong>Số điện thoại</strong></br>
                <span class ="text-white-50">+84.24 6257 6789</span></br>
            <strong>Fax</strong></br>
                <span class ="text-white-50">+84.24 6257 6789</span></br>
            <strong>Email</strong></br>
                <span class ="text-white-50">info@interland.vn</span>
            </p>
        </div>
    </div>  
</div>
<div class="container-fluid d-flex justify-content-center bg-dark text-white-50">
    <div class="col-10 d-flex justify-content-center">
        <p class ="pt-3">Bản quyền bởi Interland. Tất cả dữ liệu và hình ảnh</p>  
    </div> 
</div>
    
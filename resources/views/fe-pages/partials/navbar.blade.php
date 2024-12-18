<style>
    .navbar-nav .nav-link {
    position: relative;
    text-decoration: none;
    padding-bottom: 2px;
}

.navbar-nav .nav-link::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0%;
    height: 2px;
    background-color: #7554a3;
    transition: width 0.3s ease-in-out;
}
.navbar-nav .nav-link:hover::after {
    width: 100%;
}
</style>
<div class="container-fluid bg-light d-flex justify-content-center py-2">
    <div class="row align-items-center justify-content-between main-nav">
        <div class="col-md-2 text-center">
            <a href="{{ route('home') }}">
                <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height:80px; width:160px;">
            </a>
        </div>
        <div class="col-md-10">
            <nav class="navbar navbar-expand-md d-flex justify-content-end">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link text-dark">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('introduce') }}" class="nav-link text-dark">GIỚI THIỆU</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">LĨNH VỰC HOẠT ĐỘNG</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">DỰ ÁN</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">HÌNH ẢNH</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">KHÁCH HÀNG</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">LIÊN HỆ</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">TUYỂN DỤNG</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
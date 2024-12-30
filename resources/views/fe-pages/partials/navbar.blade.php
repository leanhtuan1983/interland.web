<style>
    .navbar-nav .nav-link {
    position: relative;
    text-decoration: none;
    padding-bottom: 2px;
}
.nav-link.active {
    font-weight: bold;
    background: #eb891a;
    border-radius: 4px;
    
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
.nav-item.dropdown:hover .dropdown-menu {
    display: block; /* Hiển thị menu khi hover */
    margin-top: 0;  /* Tùy chọn để căn chỉnh menu */
}
</style>
<!-- Thanh điều hướng chính -->
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
                    <a href="{{ route('home') }}" class="nav-link text-dark {{ Request::routeIs('home') ? 'active' : '' }}">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('introduce') }}" class="nav-link text-dark {{ Request::routeIs('introduce') ? 'active' : '' }}">GIỚI THIỆU</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{ route('all-fields') }}" class="nav-link text-dark {{ Request::routeIs('all-fields') ? 'active' : '' }}" id="navbarDropdown" role="button">
                        LĨNH VỰC HOẠT ĐỘNG
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($fields as $field)
                            <li><a class="dropdown-item" href="{{ route('category-field',$field->slug) }}">{{ $field->name }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{ route('all-projects')}}" class="nav-link text-dark {{ Request::routeIs('all-projects') ? 'active' : '' }}" id="navbarDropdown" role="button">
                        DỰ ÁN
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($projects as $project)
                            <li><a class="dropdown-item" href="{{ route('category-project',$project->slug) }}">{{ $project->name }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark {{ Request::is('hinh-anh*') ? 'active' : '' }}">HÌNH ẢNH</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('view-costumer') }}" class="nav-link text-dark {{ Request::routeIs('view-costumer') ? 'active' : '' }}">KHÁCH HÀNG</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark {{ Request::is('lien-he*') ? 'active' : '' }}">LIÊN HỆ</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark {{ Request::is('tuyen-dung*') ? 'active' : '' }}">TUYỂN DỤNG</a>
                </li>
            </ul>
        </nav>
    </div>
    </div>
</div>
<!-- Thanh điều hướng chính -->
<div class="container-fluid bg-light d-flex justify-content-center py-2">
    <div class="row container main-nav" style="width:1200px;">
        <!-- Logo -->
        <div class="col-md-2 d-flex justify-content-start align-items-center">
            <!-- Dropdown button (chỉ hiển thị khi < md) -->
            <div class="d-md-none">
                <div class="dropdown">
                    <button class="navbar-toggler" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-list"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a href="{{ route('home') }}" class="dropdown-item {{ Request::routeIs('home') ? 'active' : '' }}">TRANG CHỦ</a></li>
                        <li><a href="{{ route('introduce') }}" class="dropdown-item {{ Request::routeIs('introduce') ? 'active' : '' }}">GIỚI THIỆU</a></li>
                        <li><a href="{{ route('all-fields') }}" class="dropdown-item {{ Request::routeIs('all-fields') ? 'active' : '' }}">LĨNH VỰC HOẠT ĐỘNG</a></li>
                        <li><a href="{{ route('all-projects')}}" class="dropdown-item {{ Request::routeIs('all-projects') ? 'active' : '' }}">DỰ ÁN</a></li>
                        <li><a href="{{ route('gallery') }}" class="dropdown-item {{ Request::routeIs('gallery') ? 'active' : '' }}">HÌNH ẢNH</a></li>
                        <li><a href="{{ route('view-costumer') }}" class="dropdown-item {{ Request::routeIs('view-costumer') ? 'active' : '' }}">KHÁCH HÀNG</a></li>
                        <li><a href="{{ route('contact') }}" class="dropdown-item {{ Request::routeIs('contact') ? 'active' : '' }}">LIÊN HỆ</a></li>
                        <li><a href="#" class="dropdown-item {{ Request::is('tuyen-dung*') ? 'active' : '' }}">TUYỂN DỤNG</a></li>
                    </ul>
                </div>
            </div>

            <!-- Logo -->
            <a href="{{ route('home') }}">
                <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height:80px; width:160px;">
            </a>
        </div>

        <!-- Menu lớn (chỉ hiển thị khi >= md) -->
        <div class="col-md-10 d-none d-md-flex justify-content-end">
            <nav class="navbar navbar-expand-md d-flex justify-content-end">
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
                        <ul class="dropdown-menu fs-6 costume-dropdown">
                            @foreach ($fields as $field)
                                <li class="border-bottom border-secondary">
                                    <a class="dropdown-item" href="{{ route('category-field',$field->slug) }}">{{ $field->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('all-projects')}}" class="nav-link text-dark {{ Request::routeIs('all-projects') ? 'active' : '' }}" id="navbarDropdown" role="button">
                            DỰ ÁN
                        </a>
                        <ul class="dropdown-menu fs-6 costume-dropdown">
                            @foreach ($projects as $project)
                                <li class="border-bottom border-secondary">
                                    <a class="dropdown-item" href="{{ route('category-project',$project->slug) }}">{{ $project->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('gallery') }}" class="nav-link text-dark {{ Request::routeIs('gallery') ? 'active' : '' }}">HÌNH ẢNH</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('view-costumer') }}" class="nav-link text-dark {{ Request::routeIs('view-costumer') ? 'active' : '' }}">KHÁCH HÀNG</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link text-dark {{ Request::routeIs('contact') ? 'active' : '' }}">LIÊN HỆ</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark {{ Request::is('tuyen-dung*') ? 'active' : '' }}">TUYỂN DỤNG</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

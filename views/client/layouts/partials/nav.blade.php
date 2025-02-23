<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="{{file_url('assets/logo.png')}}" alt="Logo" class="logo">
        </a>

        <!-- Toggle Button Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Trang Chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products">Sản Phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Giới Thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên Hệ</a>
                </li>

                <!-- Giỏ hàng -->
                <li class="nav-item">
                    <a href="#" class="nav-link position-relative cart-icon">
                        🛒 <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">3</span>
                    </a>
                </li>

                <!-- Tìm kiếm -->
                <li class="nav-item d-flex align-items-center ms-3">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">🔍</button>
                    </form>
                </li>
                @if (!empty($_SESSION['user']))
                <div class="dropdown">
                    <button class="nav-link btn btn-primary text-white ms-3 dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Hello, {{ $_SESSION['user']['username'] }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="/admin">Admin</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
            @else
                <a class="nav-link btn btn-primary text-white ms-3" href="/auth">Đăng Nhập</a>
            @endif
                <!-- Đăng nhập -->
                <li class="nav-item">
                </li>
            </ul>
        </div>
    </div>
</nav>

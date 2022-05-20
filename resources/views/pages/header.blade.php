<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/asset/img/faces/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            @if (Auth::user()->phan_quyen == 1)
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home.index') }}" class="nav-link">Trang Chủ</a>
                </li>
            @endif
            {{-- <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Kết Nối</a>
            </li> --}}
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Tìm Kiếm"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <a href="{{ route('taiKhoan.maneger', ['id' => Auth::user()->id]) }}" class="dropdown-item">
                        <i class="fa fa-user fa-spin"></i> Thông Tin Người Dùng
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-cog fa-spin"></i> Cài Đặt
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer"><i
                            class="fas fa-sign-out-alt fa-spin"></i> Đăng Xuất</a>
                </ul>
            </li>
            <!-- Messages Dropdown Menu -->
            {{-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="/asset/dist/img/user1-128x128.jpg" alt="User Avatar"
                                class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Gọi tôi bất cứ lúc nào bạn cần</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 giờ trước</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="/asset/dist/img/user8-128x128.jpg" alt="User Avatar"
                                class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Tôi nhận được tin nhắn của cậu rồi</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 giờ trước</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="/asset/dist/img/user3-128x128.jpg" alt="User Avatar"
                                class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Chủ để ở đây</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 giờ trước</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">Xem tất cả tin nhắn</a>
                </div>
            </li> --}}
            <!-- Notifications Dropdown Menu -->
            {{-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 thông báo</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 tin nhắn mới
                        <span class="float-right text-muted text-sm">3 phút</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 yêu cầu kết bạn
                        <span class="float-right text-muted text-sm">12 tiếng</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 báo cáo mới
                        <span class="float-right text-muted text-sm">2 ngày</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">Xem tất cả thông báo</a>
                </div>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li> --}}
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('home.index') }}" class="brand-link">
            <img src="/asset/img/faces/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">TH True Real</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if (Auth::check() && isset(Auth::user()->hinh_anh))
                        <!-- <img src="storage/app/public/{{ Auth::user()->hinh_anh }}" class="img-circle elevation-2" alt="User Image"> -->
                        <img src="{{ asset('storage') . '/' . Auth::user()->hinh_anh }}"
                            class="img-circle elevation-2" alt="User Image">
                    @endif
                </div>
                <div class="info">
                    <a href="{{ route('taiKhoan.maneger', ['id' => Auth::user()->id]) }}" class="d-block">
                        @if (Auth::check())
                            {{ Auth::user()->ho_ten }}
                        @endif
                    </a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            {{-- <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Tìm Kiếm"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div> --}}

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                    @if (Auth::user()->phan_quyen == 1)
                        <li class="nav-item">
                            <a href="{{ route('home.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Trang chủ
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('phongHoc.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Quản Lý Phòng
                                    {{-- <i class="right fas fa-angle-left"></i> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('may.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-desktop"></i>
                                <p>
                                    Quản Lý Máy
                                    {{-- <i class="right fas fa-angle-left"></i> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('loi.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-bug"></i>
                                <p>
                                    Quản Lý lỗi
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('phanCong.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Quản Lý Phân Công
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>

                        </li>
                    @endif
                    @if (Auth::user()->phan_quyen == 0)
                        <li class="nav-item">
                            <a href="{{ route('loi.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-bug"></i>
                                <p>
                                    Danh Sách Lỗi
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('phanCong.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Phân Công
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>

                        </li>
                    @endif
                    @if (Auth::user()->phan_quyen == 1)
                        <li class="nav-item">
                            <a href="{{ route('taiKhoan.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Quản Lý Tài Khoản
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('lopHoc.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-school"></i>
                                <p>
                                    Quản Lý Lớp Học
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('giangVien.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>
                                    Quản Lý Giảng Viên
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('viPham.index') }}" class="nav-link">
                                <i class="nav-icon 	fas fa-user-slash"></i>
                                <p>
                                    Quản Lý Vi Phạm
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-stream"></i>
                                <p>
                                    Thống kê
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('thongKe.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thống kê máy lỗi</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thống kê máy lỗi đã sửa</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <button class="btn btn-danger"> <i class="fas fa-sign-out-alt fa-fw"></i> Đăng
                                Xuất</button>
                        </a>
                    </li>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        @if (Auth::user()->phan_quyen == 1)
                            <h1 class="m-0">Trang Admin</h1>
                        @else
                            <h1 class="m-0">Trang User</h1>
                        @endif
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

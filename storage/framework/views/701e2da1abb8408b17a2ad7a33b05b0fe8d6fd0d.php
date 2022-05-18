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
            <?php if(Auth::user()->phan_quyen == 1): ?>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo e(route('home.index')); ?>" class="nav-link">Trang Chủ</a>
                </li>
            <?php endif; ?>
            
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
                    <a href="<?php echo e(route('taiKhoan.maneger', ['id' => Auth::user()->id])); ?>" class="dropdown-item">
                        <i class="fa fa-user fa-spin"></i> Thông Tin Người Dùng
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-cog fa-spin"></i> Cài Đặt
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item dropdown-footer"><i
                            class="fas fa-sign-out-alt fa-spin"></i> Đăng Xuất</a>
                </ul>
            </li>
            <!-- Messages Dropdown Menu -->
            
            <!-- Notifications Dropdown Menu -->
            
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo e(route('home.index')); ?>" class="brand-link">
            <img src="/asset/img/faces/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">TH True Real</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <?php if(Auth::check() && isset(Auth::user()->hinh_anh)): ?>
                        <!-- <img src="storage/app/public/<?php echo e(Auth::user()->hinh_anh); ?>" class="img-circle elevation-2" alt="User Image"> -->
                        <img src="<?php echo e(asset('storage') . '/' . Auth::user()->hinh_anh); ?>"
                            class="img-circle elevation-2" alt="User Image">
                    <?php endif; ?>
                </div>
                <div class="info">
                    <a href="#" class="d-block">
                        <?php if(Auth::check()): ?>
                            <?php echo e(Auth::user()->ho_ten); ?>

                        <?php endif; ?>
                    </a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                    <?php if(Auth::user()->phan_quyen == 1): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('home.index')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Trang chủ
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('phongHoc.index')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Quản Lý Phòng
                                    
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('may.index')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-desktop"></i>
                                <p>
                                    Quản Lý Máy
                                    
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('loi.index')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-bug"></i>
                                <p>
                                    Quản Lý lỗi
                                    
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('phanCong.index')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Quản Lý Phân Công
                                    
                                </p>
                            </a>

                        </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->phan_quyen == 0): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('loi.index')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-bug"></i>
                                <p>
                                    Danh Sách Lỗi
                                    
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('phanCong.index')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Phân Công
                                    
                                </p>
                            </a>

                        </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->phan_quyen == 1): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('taiKhoan.index')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Quản Lý Tài Khoản
                                    
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo e(route('lopHoc.index')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-school"></i>
                                <p>
                                    Quản Lý Lớp Học
                                    
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('giangVien.index')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>
                                    Quản Lý Giảng Viên
                                    
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('viPham.index')); ?>" class="nav-link">
                                <i class="nav-icon 	fas fa-user-slash"></i>
                                <p>
                                    Quản Lý Vi Phạm
                                    
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-stream"></i>
                                <p>
                                    Thống kê
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    
                                    <a href="<?php echo e(route('thongKe.index')); ?>" class="nav-link">
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
                            
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('logout')); ?>" class="nav-link">
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

                        <?php if(Auth::user()->phan_quyen == 1): ?>
                            <h1 class="m-0">Trang Admin</h1>
                        <?php else: ?>
                            <h1 class="m-0">Trang User</h1>
                        <?php endif; ?>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
<?php /**PATH D:\Do_an\TH-True-Real\resources\views/pages/header.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Trang thông tin tài khoản người dùng'); ?>
<?php $__env->startSection('content'); ?>
    <?php //Hiển thị thông báo thành công
    ?>
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong><?php echo e(Session::get('success')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    <?php endif; ?>
    <?php //Hiển thị thông báo lỗi
    ?>
    <?php if(Session::has('error')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong><?php echo e(Session::get('error')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    <?php endif; ?>
    <section class="content">
        <div class="row" style="margin-left: 150px;">
            <div class="col-md-10">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Thông tin người dùng</h5>
                    </div>
                    <div class="card-body">
                        <!-- Lưu ý enctype của form để upload file -->
                        <!-- $diaDanh->id -->
                        <form action="<?php echo e(route('taiKhoan.update', ['taiKhoan' => $taiKhoan])); ?>" method="post"
                            enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo method_field('PATCH'); ?>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">

                                        <div class="user-image col-md-6 text-center">
                                            <label for="">Hình đại diện</label>
                                            <img id="preview-image" src="<?php echo e(asset("/storage/$taiKhoan->hinh_anh")); ?>"
                                                alt="preview image" style="max-height: 200px; padding-left: 50%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="Email" class="form-control"
                                            value="<?php echo e($taiKhoan->email); ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input type="text" name="HoTen" class="form-control"
                                            value="<?php echo e($taiKhoan->ho_ten); ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input id="mobile" type="text" name="SDT" class="form-control"
                                            value="<?php echo e($taiKhoan->sdt); ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày Sinh</label>
                                        <input type="date" name="NgaySinh" class="form-control" min="1"
                                            value="<?php echo e($taiKhoan->ngay_sinh); ?>" disabled>
                                    </div>
                                </div>
                            </div>
                    </div>
                    
                    <br>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script>
        var loadFile = function(event) {
            var previewImage = document.getElementById('preview-image');
            previewImage.src = URL.createObjectURL(event.target.files[0]);
        };

        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an\TH-True-Real\resources\views/component/tai-khoan/taikhoan-maneger.blade.php ENDPATH**/ ?>
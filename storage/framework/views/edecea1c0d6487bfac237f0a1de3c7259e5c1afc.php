

<?php $__env->startSection('title', 'Trang thêm lỗi'); ?>
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
    <div class="content">
        <div class="row" style="margin-left: 150px;">
            <div class="col-md-10">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Thêm lỗi</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('loi.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo @csrf_field(); ?>

                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <label>Tài khoản</label>
                                    <select name="User" id="" class="form-control">
                                        <option value="">-- Chọn Tài Khoản--</option>
                                        <?php $__currentLoopData = $lstUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->email); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Thời gian</label>
                                        <input type="date" name="ThoiGian" class="form-control" min="1"
                                            placeholder="Thời gian">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <label>Phòng</label>
                                    <select name="Phong" id="" class="form-control">
                                        <option value="">-- Chọn phòng--</option>
                                        <?php $__currentLoopData = $lstPhongHoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phongHoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($phongHoc->id); ?>"><?php echo e($phongHoc->ten_phong); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <label>Máy</label>
                                    <select name="May" id="" class="form-control">
                                        <option value="">-- Chọn Máy--</option>
                                        <?php $__currentLoopData = $lstMay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $may): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($may->id); ?>"><?php echo e($may->so_may); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-1"><br>
                                    <label>Ghi chú lỗi</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="TenLoi" id="" cols="165" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="">Hình ảnh</label>
                                                            <input type="file" name="images" accept="image/*" class="form-control" id="images" onchange="loadFile(event)" placeholder="Hình ảnh">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                            <!-- <div class="row">
                                                <div class="col-md pr-1">
                                                    <div class="form-group">
                                                        <label for="">Hình</label>
                                                        <div class="user-image col-md-12 text-center">
                                                            <img id="preview-image" src="<?php echo e(asset('asset/img/khongxacdinh.jpg')); ?>" alt="preview image" style="max-height: 200px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->

                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Thêm lỗi</button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var loadFile = function(event) {
            var previewImage = document.getElementById('preview-image');
            previewImage.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an\TH-True-Real\resources\views/component/loi/loi-create.blade.php ENDPATH**/ ?>
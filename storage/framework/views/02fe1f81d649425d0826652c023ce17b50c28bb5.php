<?php $__env->startSection('title', 'Trang thêm ca học'); ?>
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
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="card-title">Thêm Ca Học</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo e(route('caHoc.index')); ?>" class="">
                                    <button class="btn btn-success"> <i class="fas fa-reply"></i> Trở về</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('caHoc.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo @csrf_field(); ?>

                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Tên Người Trực</label>
                                        <select name="TenNguoiTruc" id="" class="form-control">
                                            <option value="">-- Chọn Người Trực--</option>
                                            <?php $__currentLoopData = $lstUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>">
                                                    <?php echo e($user->ho_ten); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Tên Ca</label>
                                        <input type="checkbox" name="checkBox[]" value="1"> 1 <br />
                                        <input type="checkbox" name="checkBox[]" value="2"> 2 <br />
                                        <input type="checkbox" name="checkBox[]" value="3"> 3 <br />
                                        <input type="checkbox" name="checkBox[]" value="4"> 3 <br />
                                    </div>
                                </div>
                                

                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    
                                </div>
                                <div class="col-md-4 pr-1">
                                    <label>Phòng</label>
                                    <select name="TenPhong" id="" class="form-control">
                                        <option value="">-- Chọn phòng--</option>
                                        <?php $__currentLoopData = $lstPhongHoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phongHoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($phongHoc->id); ?>"><?php echo e($phongHoc->ten_phong); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-4 pr-1">
                                </div>
                            </div>
                            
                            <br>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Thêm Ca học</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an_local\TH-True-Real\resources\views/component/ca-hoc/cahoc-create.blade.php ENDPATH**/ ?>
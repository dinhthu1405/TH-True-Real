<?php $__env->startSection('title', 'Trang quản lí tài khoản'); ?>
<?php $__env->startSection('content'); ?>


    <?php if($lstTaiKhoan->isNotEmpty()): ?>
        <section class="content" style="padding-left: 2%; padding-bottom: 2%">
            <form action="#" method="post">
                <?php echo e(csrf_field()); ?>


                <div class="row">
                    <div class="col-md-4">
                        <input class="form-control" type="search" name="search" required />
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="form-control btn btn-primary"><i class="fas fa-search fa-fw"></i> Tìm
                            kiếm</button>
                    </div>
                </div>
            </form>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="row">
                            <div class="col-md-10">
                                <h4 style="padding-top: 25px; padding-left: 25px" class="card-title">Thông Tin Tài Khoản
                                </h4>
                            </div>
                            <div style="padding-top: 18px" class="col-md-2">
                                <a href="<?php echo e(route('taiKhoan.create')); ?>" class="">
                                    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Tài Khoản</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table" style="text-align: center;">
                                    <thead class="text-primary">
                                        <th>Ảnh đại diện</th>
                                        <th>Email</th>
                                        <th>Họ và Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày Sinh</th>
                                        <th>Loại Tài Khoản</th>
                                        <th>Phòng</th>
                                        <th>Khóa</th>
                                        <th>Sửa</th>
                                    </thead>
                                    <?php $__currentLoopData = $lstTaiKhoan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taiKhoan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($taiKhoan->trang_thai == 0): ?>
                                            <tbody style="background-color: darkgrey">
                                                <tr>
                                                    <td><img style="vertical-align: middle; width: 50px; height: 50px; border-radius: 50%;"
                                                            src="<?php echo e(asset("$taiKhoan->hinh_anh")); ?>" alt="">
                                                    </td>
                                                    <td><?php echo e($taiKhoan->email); ?></td>
                                                    <td><?php echo e($taiKhoan->ho_ten); ?></td>
                                                    <td><?php echo e($taiKhoan->sdt); ?></td>
                                                    <td><?php echo e($taiKhoan->ngay_sinh); ?></td>
                                                    <?php if($taiKhoan->phan_quyen == 1): ?>
                                                        <td>Người quản trị</td>
                                                    <?php else: ?>
                                                        <td>Người dùng</td>
                                                    <?php endif; ?>
                                                    <td><?php echo e($taiKhoan->phongHocs->ten_phong); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(route('taiKhoan.xoa', $taiKhoan->id)); ?>"
                                                            onclick="return confirm('Bạn có chắc muốn mở khoá tài khoản này')"><button
                                                                class="btn btn-danger" type="submit">Mở khoá</button></a>
                                                        <!-- </a> -->
                                                    </td>
                                                    <td><a href="<?php echo e(route('taiKhoan.edit', $taiKhoan->id)); ?>"><button
                                                                class="btn btn-warning">Sửa</button></a></td>
                                                </tr>
                                            </tbody>
                                        <?php else: ?>
                                            <tbody>
                                                <tr>
                                                    <td><img style=" vertical-align: middle; width: 50px; height: 50px; border-radius: 50%;"
                                                            src="<?php echo e(asset("$taiKhoan->hinh_anh")); ?>" alt="">
                                                    </td>

                                                    <td><?php echo e($taiKhoan->email); ?></td>
                                                    <td><?php echo e($taiKhoan->ho_ten); ?></td>
                                                    <td><?php echo e($taiKhoan->sdt); ?></td>
                                                    <td><?php echo e($taiKhoan->ngay_sinh); ?></td>
                                                    <?php if($taiKhoan->phan_quyen == 1): ?>
                                                        <td>Người quản trị</td>
                                                    <?php else: ?>
                                                        <td>Người dùng</td>
                                                    <?php endif; ?>
                                                    
                                                    
                                                    <td>
                                                        <a href="<?php echo e(route('taiKhoan.xoa', $taiKhoan->id)); ?>"
                                                            onclick="return confirm('Bạn có chắc muốn khoá tài khoản này')"><button
                                                                class="btn btn-danger" type="submit">Khoá</button></a>
                                                        <!-- </a> -->
                                                    </td>
                                                    <td><a href="<?php echo e(route('taiKhoan.edit', $taiKhoan->id)); ?>"><button
                                                                class="btn btn-warning">Sửa</button></a></td>
                                                </tr>
                                            </tbody>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <div class="row">
            <div class="col-md-10">
                <h2 style="padding-left: 2%">Không tìm thấy tài khoản nào</h2>
            </div>
            <div class="col-md-2">
                <a href="<?php echo e(route('taiKhoan.create')); ?>" class="">
                    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Tài Khoản</button>
                </a>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<!-- <?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?> -->

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an_local\TH-True-Real\resources\views/component/tai-khoan/taikhoan-show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Trang quản lí tài khoản'); ?>
<?php $__env->startSection('content'); ?>
    
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h4 style="padding-top: 10px" class="card-title">Thông Tin Tài Khoản</h4>
            </div>
            <div class="col-md-2">
                <a href="<?php echo e(route('taiKhoan.create')); ?>"><button class="btn btn-success">Thêm
                        Tài Khoản</button></a>
            </div>
        </div>
    </div>
    <?php if($lstTaiKhoan->isNotEmpty()): ?>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
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
        <div>
            <h2 style="padding-left: 2%">Không tìm thấy tài khoản nào</h2>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<!-- <?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?> -->

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an\TH-True-Real\resources\views/component/tai-khoan/taikhoan-show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Trang quản lí lỗi'); ?>
<?php $__env->startSection('content'); ?>
    <!-- <section class="content" style="padding-left: 2%; padding-bottom: 2%">
                                    
                                </section> -->
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h4 style="padding-top: 10px" class="card-title">Thông Tin Lỗi</h4>
            </div>
            <div class="col-md-2">
                <a href="<?php echo e(route('loi.create')); ?>"><button class="btn btn-success">Thêm
                        Lỗi</button></a>
            </div>

        </div>
    </div>
    <?php if($lstLoi->isNotEmpty()): ?>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="row">
                                <table class="table" style="text-align: center;">
                                    <thead class="text-primary">
                                        <th>Tên lỗi</th>
                                        <th>Thời gian</th>
                                        <th>Phòng</th>
                                        <th>Số máy</th>
                                        <th>Tài khoản</th>
                                        <th>Xóa</th>
                                        <th>Sửa</th>
                                    </thead>
                                    <?php $__currentLoopData = $lstLoi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo e($loi->ten_loi); ?></td>
                                                <td><?php echo e($loi->thoi_gian); ?></td>
                                                <td><?php echo e($loi->phongHoc->ten_phong); ?></td>
                                                <td><?php echo e($loi->may->so_may); ?></td>
                                                <td><?php echo e($loi->user->email); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('loi.xoa', $loi->id)); ?>"
                                                        onclick="return confirm('Bạn có chắc muốn xoá máy này')"><button
                                                            class="btn btn-danger" type="submit">Xóa</button></a>
                                                    <!-- </a> -->
                                                </td>
                                                <td><a href="<?php echo e(route('loi.edit', $loi->id)); ?>"><button
                                                            class="btn btn-warning">Sửa</button></a></td>
                                            </tr>
                                        </tbody>
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
            <h2 style="padding-left: 2%">Không tìm thấy lỗi nào</h2>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an\TH-True-Real\resources\views/component/loi/loi-show.blade.php ENDPATH**/ ?>
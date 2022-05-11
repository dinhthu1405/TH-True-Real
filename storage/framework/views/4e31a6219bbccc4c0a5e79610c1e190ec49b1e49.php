<?php $__env->startSection('title', 'Trang quản lí lỗi'); ?>
<?php $__env->startSection('content'); ?>
    <?php if($lstLoi->isNotEmpty()): ?>
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
                                <h4 style="padding-top: 25px; padding-left: 25px" class="card-title">Thông Tin Lỗi
                                </h4>
                            </div>
                            <div style="padding-top: 18px" class="col-md-2">
                                <a href="<?php echo e(route('loi.create')); ?>" class="">
                                    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Lỗi</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table" style="text-align: center;">
                                    <thead class="text-primary">
                                        <th>Tên lỗi</th>
                                        <th>Thời gian</th>
                                        <th>Phòng</th>
                                        <th>Số máy</th>
                                        <th>Tài khoản</th>
                                        <th>Tình trạng lỗi</th>
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
                                                <td><?php echo e($loi->tinh_trang_loi); ?></td>
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
        <div class="row">
            <div class="col-md-10">
                <h2 style="padding-left: 2%">Không tìm thấy lỗi nào</h2>
            </div>
            <div class="col-md-2">
                <a href="<?php echo e(route('loi.create')); ?>" class="">
                    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Lỗi</button>
                </a>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an_local\TH-True-Real\resources\views/component/loi/loi-show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Trang quản lí giảng viên'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content" style="padding-left: 2%; padding-bottom: 2%">
        
    </section>
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h4 style="padding-top: 10px" class="card-title">Thông Tin Giảng Viên</h4>
            </div>
            <div class="col-md-2">
                <a href="<?php echo e(route('giangVien.create')); ?>"><button class="btn btn-success">Thêm
                        Giảng Viên</button></a>
            </div>
        </div>
    </div>
    <?php if($lstGiangVien->isNotEmpty()): ?>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="row">
                                <table class="table" style="text-align: center;">
                                    <thead class="text-primary">
                                        <th>Tên lớp</th>
                                        <th>Xóa</th>
                                        <th>Sửa</th>
                                    </thead>
                                    <?php $__currentLoopData = $lstGiangVien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $giangVien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo e($giangVien->ten_giang_vien); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('giangVien.xoa', $giangVien->id)); ?>"
                                                        onclick="return confirm('Bạn có chắc muốn xoá giảng viên này')"><button
                                                            class="btn btn-danger" type="submit">Xóa</button></a>
                                                    <!-- </a> -->
                                                </td>
                                                <td><a href="<?php echo e(route('giangVien.edit', $giangVien->id)); ?>"><button
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
            <h2 style="padding-left: 2%">Không tìm thấy giảng viên này</h2>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an\TH-True-Real\resources\views/component/giang-vien/giangvien-show.blade.php ENDPATH**/ ?>
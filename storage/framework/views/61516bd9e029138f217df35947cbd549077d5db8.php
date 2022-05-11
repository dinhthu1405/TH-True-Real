<?php $__env->startSection('title', 'Trang quản lí ca'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h4 style="padding-top: 10px" class="card-title">Thông Tin Ca Trực</h4>
            </div>
            <div class="col-md-2">
                <a href="<?php echo e(route('caHoc.create')); ?>"><button class="btn btn-success">Thêm
                        Ca Trực</button></a>
            </div>
        </div>
    </div>
    <?php if($lstCaHoc->isNotEmpty()): ?>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="row">
                                <table class="table" style="text-align: center;">
                                    <thead class="text-primary">
                                        <th>Tên người trực</th>
                                        <th>Ca</th>
                                        <th>Tên phòng</th>
                                        <th>Ngày bắt đầu trực</th>
                                        <th>Ngày kết thúc</th>
                                        
                                        <th>Xóa</th>
                                        <th>Sửa</th>
                                    </thead>
                                    <?php $__currentLoopData = $lstCaHoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caHoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo e($caHoc->users->ho_ten); ?></td>
                                                <td><?php echo e($caHoc->ten_ca); ?></td>
                                                <td><?php echo e(Str::limit($caHoc->phongHocs->ten_phong, 15)); ?></td>
                                                <td><?php echo e($caHoc->ngay_bat_dau); ?></td>
                                                <td><?php echo e($caHoc->ngay_ket_thuc); ?></td>
                                                
                                                <td>
                                                    <a href="<?php echo e(route('caHoc.xoa', $caHoc->id)); ?>"
                                                        onclick="return confirm('Bạn có chắc muốn xoá ca học này, vì nó có thể ảnh hưởng đến ca học')"><button
                                                            class="btn btn-danger" type="submit">Xóa</button></a>
                                                    <!-- </a> -->
                                                </td>
                                                <td><a href="<?php echo e(route('caHoc.edit', $caHoc->id)); ?>"><button
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
            <h2 style="padding-left: 2%">Không tìm thấy ca học nào</h2>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<!-- <?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?> -->

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an\TH-True-Real\resources\views/component/ca-hoc/cahoc-show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Trang quản lí ca'); ?>
<?php $__env->startSection('content'); ?>


    <?php if($lstCaHoc->isNotEmpty()): ?>
        <section class="content" style="padding-left: 2%; padding-bottom: 2%">
            <form action="#" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-4">
                        <input class="form-control" type="search" name="search" required />
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="form-control btn btn-primary">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="card-title">Thông Tin Ca Học</h4>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?php echo e(route('caHoc.create')); ?>" class="">
                                        <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Ca</button>
                                    </a>
                                </div>
                            </div>
                        </div>
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
                                                <td><?php echo e($caHoc->ten_ca); ?></td>
                                                <td><?php echo e($caHoc->ten_ca); ?></td>
                                                
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
        <div class="row">
            <div class="col-md-10">
                <h2 style="padding-left: 2%">Không tìm thấy ca học nào</h2>
            </div>
            <div class="col-md-2">
                <a href="<?php echo e(route('caHoc.create')); ?>" class="">
                    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Ca</button>
                </a>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<!-- <?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?> -->

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an_local\TH-True-Real\resources\views/component/ca-hoc/cahoc-show.blade.php ENDPATH**/ ?>
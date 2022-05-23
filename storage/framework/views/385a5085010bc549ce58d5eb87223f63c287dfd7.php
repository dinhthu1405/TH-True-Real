<?php $__env->startSection('title', 'Trang quản lí lớp học'); ?>
<?php $__env->startSection('content'); ?>

    <?php if(Auth::user()->phan_quyen == 1): ?>
        <?php if($lstLopHoc->isNotEmpty()): ?>
            <section class="content" style="padding-left: 2%; padding-bottom: 2%">
                <form action="<?php echo e(route('lopHoc.search')); ?>" method="post">
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
                                    <h4 style="padding-top: 25px; padding-left: 25px" class="card-title">Thông Tin Lớp
                                    </h4>
                                </div>
                                <div style="padding-top: 18px" class="col-md-2">
                                    <a href="<?php echo e(route('lopHoc.create')); ?>" class="">
                                        <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Lớp</button>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <table class="table" style="text-align: center;">
                                        <thead class="text-primary">
                                            <th>Tên lớp</th>
                                            <th>Xóa</th>
                                            <th>Sửa</th>
                                        </thead>
                                        <?php $__currentLoopData = $lstLopHoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lopHoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo e($lopHoc->ten_lop); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(route('lopHoc.xoa', $lopHoc->id)); ?>"
                                                            onclick="return confirm('Bạn có chắc muốn xoá lớp học này')"><button
                                                                class="btn btn-danger" type="submit"><i
                                                                    class="fas fa-trash-alt"></i></button></a>
                                                        <!-- </a> -->
                                                    </td>
                                                    <td><a href="<?php echo e(route('lopHoc.edit', $lopHoc->id)); ?>"><button
                                                                class="btn btn-warning"><i
                                                                    class="fas fa-pencil-alt"></i></button></a></td>
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
                    <h2 style="padding-left: 2%">Không tìm thấy lớp học nào</h2>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo e(route('lopHoc.create')); ?>" class="">
                        <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Lớp</button>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an\TH-True-Real\resources\views/component/lop-hoc/lophoc-show.blade.php ENDPATH**/ ?>
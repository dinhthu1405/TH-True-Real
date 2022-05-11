

<?php $__env->startSection('title', 'Trang quản lí lớp học'); ?>
<?php $__env->startSection('content'); ?>
<section class="content" style="padding-left: 2%; padding-bottom: 2%">

</section>
<?php if($lstLopHoc->isNotEmpty()): ?>
<section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" >Thông Tin Lớp Học</h4>
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
                          <a href="<?php echo e(route('lopHoc.xoa',$lopHoc->id)); ?>" onclick="return confirm('Bạn có chắc muốn xoá lớp học này')"><button class="btn btn-danger" type="submit">Xóa</button></a>
                        <!-- </a> -->
                      </td>
                      <td><a href="<?php echo e(route('lopHoc.edit',$lopHoc->id)); ?>"><button class="btn btn-warning">Sửa</button></a></td>
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
    <h2 style="padding-left: 2%">Không tìm thấy lớp học nào</h2>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an\TH-True-Real\resources\views/component/lop-hoc/lophoc-show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Trang thêm lỗi'); ?>
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
                                <h5 class="card-title"> Thêm Lỗi</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo e(route('loi.index')); ?>" class="">
                                    <button class="btn btn-success"> <i class="fas fa-reply"></i> Trở về</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('loi.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo @csrf_field(); ?>

                            <div class="row">
                                
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Thời gian</label>
                                        <input type="date" name="ThoiGian" class="form-control" min="1"
                                            placeholder="Thời gian">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <label>Phòng</label>
                                    <select name="Phong" id="phong" class="form-control">
                                        <option value="">-- Chọn phòng--</option>
                                        <?php $__currentLoopData = $lstPhongHoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phongHoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($phongHoc->id); ?>"><?php echo e($phongHoc->ten_phong); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-md-6 pr-1">
                                    <label>Máy</label>
                                    <select name="May" id="" class="form-control">
                                        <option value="">-- Chọn Máy--</option>
                                        <?php $__currentLoopData = $lstMay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $may): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($may->id); ?>"><?php echo e($may->so_may); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <label>Giảng viên</label>
                                    <select name="GiangVien" id="" class="form-control">
                                        <option value="">-- Chọn giảng viên--</option>
                                        <?php $__currentLoopData = $lstGiangVien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $giangVien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($giangVien->id); ?>"><?php echo e($giangVien->ten_giang_vien); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <label>Lớp học</label>
                                    <select name="LopHoc" id="" class="form-control">
                                        <option value="">-- Chọn lớp học--</option>
                                        <?php $__currentLoopData = $lstLopHoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lopHoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lopHoc->id); ?>"><?php echo e($lopHoc->ten_lop); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-1"><br>
                                    <label>Tên lỗi</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="TenLoi" id="" cols="165" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Thêm lỗi</button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var loadFile = function(event) {
            var previewImage = document.getElementById('preview-image');
            previewImage.src = URL.createObjectURL(event.target.files[0]);
        };
        // var getDropdown = function(e) {
        //     $('.variant').change(function() {
        //         var size = $(".variant").get().map(function(el) {
        //             return el.value
        //         }).join(" / "); //get value of slected options and then join
        //         $("select#data >  option:contains(" + size + ")").prop('selected', true); //set selected value
        //     });
        // }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an\TH-True-Real\resources\views/component/loi/loi-create.blade.php ENDPATH**/ ?>
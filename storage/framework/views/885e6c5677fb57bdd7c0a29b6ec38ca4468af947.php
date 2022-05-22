<?php $__env->startSection('title', 'Trang quản lí lỗi'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            padding-top: 60px;
            margin-left: 8%;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes  animatezoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* Change styles for span and cancel button on extra small screens */
        @media  screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }

    </style>
    <?php if($lstLoi->isNotEmpty()): ?>
        <section class="content" style="padding-left: 2%; padding-bottom: 2%">
            <form action="<?php echo e(route('loi.search')); ?>" method="post">
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
                                        <th>Giảng viên</th>
                                        <th>Lớp học</th>
                                        <th>Tình trạng lỗi</th>
                                        <?php if(Auth::user()->phan_quyen == 1): ?>
                                            <th>Xóa</th>
                                        <?php endif; ?>
                                        <th>Sửa</th>

                                    </thead>
                                    <?php $__currentLoopData = $lstLoi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo e(Str::limit($loi->ten_loi, 10)); ?>

                                                    <a href="#"
                                                        onclick="document.getElementById('id<?php echo e($loi->id); ?>').style.display='block'"
                                                        style="width:auto;">Xem thêm</a>
                                                    <div id="id<?php echo e($loi->id); ?>" class="modal">
                                                        <form class="modal-content animate">
                                                            <span
                                                                onclick="document.getElementById('id<?php echo e($loi->id); ?>').style.display='none'"
                                                                class="close" title="Close Modal">&times;</span>
                                                            <div class="container">
                                                                <span><?php echo e($loi->ten_loi); ?></span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>

                                                





                                                
                                                <td><?php echo e($loi->thoi_gian); ?></td>
                                                <td><?php echo e($loi->phongHoc->ten_phong); ?></td>
                                                <td><?php echo e($loi->may->so_may); ?></td>
                                                <td><?php echo e($loi->user->email); ?></td>
                                                <td><?php echo e($loi->giangVien->ten_giang_vien); ?></td>
                                                <td><?php echo e($loi->lopHoc->ten_lop); ?></td>
                                                <td>
                                                    <?php if($loi->tinh_trang_loi == 'Đã sửa'): ?>
                                                        <span style="color: green"><?php echo e($loi->tinh_trang_loi); ?></span>
                                                    <?php else: ?>
                                                        <span style="color: red"><?php echo e($loi->tinh_trang_loi); ?></span>
                                                    <?php endif; ?>

                                                </td>
                                                <?php if(Auth::user()->phan_quyen == 1): ?>
                                                    <td>
                                                        <a href="<?php echo e(route('loi.xoa', $loi->id)); ?>"
                                                            onclick="return confirm('Bạn có chắc muốn xoá Lỗi này')"><button
                                                                class="btn btn-danger" type="submit">Xóa</button></a>

                                                    </td>
                                                <?php endif; ?>
                                                <td><a href="<?php echo e(route('loi.edit', $loi->id)); ?>"><button
                                                            class="btn btn-warning">Sửa</button></a></td>

                                            </tr>
                                        </tbody>
                                        <script>
                                            var modal = document.getElementById($loi - > id);

                                            // When the user clicks anywhere outside of the modal, close it
                                            window.onclick = function(event) {
                                                if (event.target == modal) {
                                                    modal.style.display = "none";
                                                }
                                            }

                                            // // Get the modal
                                            // var modal = document.getElementById('id01');

                                            // // When the user clicks anywhere outside of the modal, close it
                                            // window.onclick = function(event) {
                                            //     if (event.target == modal) {
                                            //         modal.style.display = "none";
                                            //     }
                                            // }
                                        </script>
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
            
            <div style="padding-top: 18px" class="col-md-2">
                <a href="<?php echo e(route('loi.create')); ?>" class="">
                    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Lỗi</button>
                </a>
            </div>
    <?php endif; ?>
    </div>

    <script>
        var getId = function(id) {
            var modal = document.getElementById(id);

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
        // // Get the modal
        // var modal = document.getElementById('id01');

        // // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function(event) {
        //     if (event.target == modal) {
        //         modal.style.display = "none";
        //     }
        // }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['pageId' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Do_an\TH-True-Real\resources\views/component/loi/loi-show.blade.php ENDPATH**/ ?>
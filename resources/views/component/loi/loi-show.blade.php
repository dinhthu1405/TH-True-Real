@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang quản lí lỗi')
@section('content')
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

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }

    </style>
    @if ($lstLoi->isNotEmpty())
        <section class="content" style="padding-left: 2%; padding-bottom: 2%">
            <form action="#" method="post">
                {{ csrf_field() }}
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
                                <a href="{{ route('loi.create') }}" class="">
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
                                        @if (Auth::user()->phan_quyen == 1)
                                            <th>Xóa</th>
                                            <th>Sửa</th>
                                        @endif

                                    </thead>
                                    @foreach ($lstLoi as $loi)
                                        <tbody>
                                            <tr>

                                                <td>{{ Str::limit($loi->ten_loi, 10) }}
                                                    ...
                                                    <a href="#"
                                                        onclick="document.getElementById('id{{ $loi->id }}').style.display='block'"
                                                        style="width:auto;">Xem thêm</a>
                                                    <div id="id{{ $loi->id }}" class="modal">
                                                        <form class="modal-content animate">
                                                            <span
                                                                onclick="document.getElementById('id{{ $loi->id }}').style.display='none'"
                                                                class="close" title="Close Modal">&times;</span>
                                                            <div class="container">
                                                                <span>{{ $loi->ten_loi }}</span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>

                                                {{-- <td>
                                                    @if (strlen($loi->ten_loi) > 20)
                                                        {{ substr($loi->ten_loi, 0, 10) }}
                                                        <span class="read-more-show hide_content">Xem Thêm</span>
                                                        <span class="read-more-content">
                                                            {{ substr($loi->ten_loi, 20, strlen($loi->ten_loi)) }}
                                                            <span class="read-more-hide hide_content">Thu lại</span>
                                                        </span>
                                                    @else
                                                        {{ $loi->ten_loi }}
                                                    @endif
                                                </td> --}}





                                                {{-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
                                                <script type="text/javascript">
                                                    // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
                                                    $('.read-more-content').addClass('hide_content')
                                                    $('.read-more-show, .read-more-hide').removeClass('hide_content')

                                                    // Set up the toggle effect:
                                                    $('.read-more-show').on('click', function(e) {
                                                        $(this).next('.read-more-content').removeClass('hide_content');
                                                        $(this).addClass('hide_content');
                                                        e.preventDefault();
                                                    });

                                                    // Changes contributed by @diego-rzg
                                                    $('.read-more-hide').on('click', function(e) {
                                                        var p = $(this).parent('.read-more-content');
                                                        p.addClass('hide_content');
                                                        p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
                                                        e.preventDefault();
                                                    });
                                                </script>
                                                <style type="text/css">
                                                    .read-more-show {
                                                        cursor: pointer;
                                                        color: #000000;
                                                    }

                                                    .read-more-hide {
                                                        cursor: pointer;
                                                        color: #000000;
                                                    }

                                                    .hide_content {
                                                        display: none;
                                                    }

                                                </style> --}}
                                                <td>{{ $loi->thoi_gian }}</td>
                                                <td>{{ $loi->phongHoc->ten_phong }}</td>
                                                <td>{{ $loi->may->so_may }}</td>
                                                <td>{{ $loi->user->email }}</td>
                                                <td>{{ $loi->tinh_trang_loi }}</td>
                                                @if (Auth::user()->phan_quyen == 1)
                                                    <td>
                                                        <a href="{{ route('loi.xoa', $loi->id) }}"
                                                            onclick="return confirm('Bạn có chắc muốn xoá Lỗi này')"><button
                                                                class="btn btn-danger" type="submit">Xóa</button></a>
                                                        <!-- </a> -->
                                                    </td>
                                                    <td><a href="{{ route('loi.edit', $loi->id) }}"><button
                                                                class="btn btn-warning">Sửa</button></a></td>
                                                @endif

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
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="row">
            <div class="col-md-10">
                <h2 style="padding-left: 2%">Không tìm thấy lỗi nào</h2>
            </div>
            {{-- @if (Auth::user()->phan_quyen == 1)
                <div style="padding-top: 18px" class="col-md-2">
                    <a href="{{ route('loi.create') }}" class="">
    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Lỗi</button>
    </a>
</div>
@else --}}
            <div style="padding-top: 18px" class="col-md-2">
                <a href="{{ route('loi.create') }}" class="">
                    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Lỗi</button>
                </a>
            </div>
    @endif
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
@endsection

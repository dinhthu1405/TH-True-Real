@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang thêm tài khoản')
@section('content')
    <?php //Hiển thị thông báo thành công
    ?>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
    <?php //Hiển thị thông báo lỗi
    ?>
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
    <div class="content">
        <div class="row" style="margin-left: 150px;">
            <div class="col-md-10">
                <div class="card card-user">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="card-title">Thêm Tài Khoản</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('taiKhoan.index') }}" class="">
                                    <button class="btn btn-success"> <i class="fas fa-reply"></i> Trở về</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('taiKhoan.store') }}" method="post" enctype="multipart/form-data">
                            {!! @csrf_field() !!}
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="Email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" id="password" name="MatKhau" class="form-control"
                                            placeholder="Nhập Mật khẩu">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label></label>
                                    <div class="form-group" style="padding-top: 15px">
                                        <input type="checkbox" id="checkbox" onchange="myFunction()">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label>Họ tên</label>
                                    <div class="form-group">
                                        <input type="text" name="HoTen" class="form-control" placeholder="Nhập Họ tên">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="">Ảnh đại diện</label>
                                            <input type="file" name="images" accept="image/*" class="form-control"
                                                id="images" onchange="loadFile(event)" placeholder="Hình ảnh">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    {{-- <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="number" name="SĐT" class="form-control" min="1"
                                            placeholder="Số điện thoại">
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input id="mobile" type="text" name="SDT" class="form-control"
                                            placeholder="Nhập Số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày Sinh</label>
                                        <input type="date" name="NgaySinh" class="form-control" min="1"
                                            placeholder="Ngày Sinh">
                                    </div>
                                </div>
                                <div class="col-md pr-1">
                                    <div class="form-group">
                                        <label for="">Show hình</label>
                                        <div class="user-image col-md-12 text-center">
                                            <img id="preview-image" src="{{ asset('asset/img/khongxacdinh.jpg') }}"
                                                alt="preview image" style="max-height: 200px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Thêm tài khoản</button>
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

        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection

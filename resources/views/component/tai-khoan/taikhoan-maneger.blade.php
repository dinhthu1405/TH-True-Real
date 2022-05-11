@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang thông tin người dùng')
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
    <section class="content">
        <div class="row" style="margin-left: 150px;">
            <div class="col-md-10">
                <div class="card card-user">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="card-title">Thông Tin Tài Khoản</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('home.index') }}" class="">
                                    <button class="btn btn-success"> <i class="fas fa-reply"></i>Trở về</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Lưu ý enctype của form để upload file -->
                        <!-- $diaDanh->id -->
                        <form action="{{ route('taiKhoan.update', ['taiKhoan' => $taiKhoan]) }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{-- <div class="form-group">
                                                <label for="">Ảnh đại diện</label>
                                                <input type="file" name="images" accept="image/*" class="form-control"
                                                id="images" onchange="loadFile(event)" placeholder="Hình ảnh">
                                            </div> --}}
                                            <div class="col-md pr-1">
                                                <div class="form-group">
                                                    <label for="">Ảnh đại diện</label>
                                                    <div class="user-image col-md-6 text-center">
                                                        <img id="preview-image"
                                                            src="{{ asset("/storage/$taiKhoan->hinh_anh") }}"
                                                            alt="preview image"
                                                            style="max-height: 200px; padding-left: 50%; padding-top: 50px">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="Email" class="form-control"
                                            value="{{ $taiKhoan->email }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input type="text" name="HoTen" class="form-control" disabled
                                            value="{{ $taiKhoan->ho_ten }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input id="mobile" type="text" name="SDT" class="form-control" disabled
                                            placeholder="Nhập Số điện thoại" value="{{ $taiKhoan->sdt }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày Sinh</label>
                                        <input type="date" name="NgaySinh" class="form-control" min="1" disabled
                                            placeholder="Ngày Sinh" value="{{ $taiKhoan->ngay_sinh }}">
                                    </div>
                                </div>

                            </div>


                    </div>
                    {{-- <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">Sửa tài khoản</button>
                        </div>
                    </div> --}}
                    <br>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
        </div>
    </section>
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
    {{-- <script>

    </script> --}}

@endsection

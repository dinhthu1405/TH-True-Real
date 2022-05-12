@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang sửa Lỗi')
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
                    {{-- <div class="card-header">
                        <h5 class="card-title">Sửa Lỗi</h5>
                    </div> --}}
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="card-title">Sửa Lỗi</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('loi.index') }}" class="">
                                    <button class="btn btn-success"> <i class="fas fa-reply"></i> Trở về</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Lưu ý enctype của form để upload file -->
                        <!-- $diaDanh->id -->
                        <form action="{{ route('loi.update', ['loi' => $loi]) }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tài Khoản</label>
                                    <div class="form-group">
                                        <input disabled type="text" name="TaiKhoanView" class="form-control"
                                            placeholder="Tài Khoản" value="{{ $loi->user->email }}">
                                        <input hidden type="text" name="TaiKhoan" class="form-control"
                                            placeholder="Tài Khoản" value="{{ $loi->user->id }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tình Trạng</label> <br />
                                        {{-- @if ($loi->tinh_trang_loi === 'Chưa sửa')
                                            <input type="checkbox" name="checkBox[]" value="Chưa sửa" checked="">
                                            Chưa
                                            sửa<br />
                                        @else
                                            <input type="checkbox" name="checkBox[]" value="Đã sửa"> Đã sửa <br />
                                        @endif --}}

                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-success active">
                                                <input onclick="disable()" type="checkbox" name="checkBox" value="Đã sửa"
                                                    id="checkBox1" checked autocomplete="off">
                                            </label>
                                            <label class="btn btn-danger">
                                                <input onclick="disable()" type="checkbox" name="checkBox" value="Chưa sửa"
                                                    id="checkBox2" autocomplete="off">
                                            </label>

                                        </div>
                                        {{-- <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-success active">
                                                <input type="checkbox" name="checkBox" value="Đã sửa" id="" checked
                                                    autocomplete="off">
                                            </label>
                                            <label class="btn btn-danger">
                                                <input type="checkbox" name="checkBox" value="Chưa sửa" id=""
                                                    autocomplete="off">
                                            </label>

                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Thời Gian</label>
                                    <div class="form-group">
                                        <input type="date" name="ThoiGianView" class="form-control" disabled
                                            value="{{ $loi->thoi_gian }}">
                                        <input type="date" hidden name="ThoiGian" class="form-control"
                                            value="{{ $loi->thoi_gian }}">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <label>Tên Lỗi</label>
                                    <div class="form-group">
                                        <input type="text" name="TenLoi" class="form-control" placeholder="Tên Lỗi"
                                            value="{{ $loi->ten_loi }}">
                                    </div>
                                </div>
                            </div> --}}
                            <div class=" row">
                                <div class="col-md-6">
                                    <label>Phòng</label>
                                    <input type="text" disabled name="Phongs" class="form-control"
                                        value="{{ $loi->phongHoc->ten_phong }}">
                                    <input hidden type="text" readonly name="Phong" class="form-control"
                                        placeholder="Phòng" value="{{ $loi->phongHoc->id }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Số Máy</label>
                                    <input type="text" disabled name="TenMay" class="form-control"
                                        value="{{ $loi->may->so_may }}">
                                    <input hidden type="text" readonly name="May" class="form-control"
                                        value="{{ $loi->may->id }}">

                                    {{-- <select name="May" id="" class="form-control">
                                        <option value="">-- Chọn Máy--</option>
                                        @foreach ($lstMay as $may)
                                            <option value="{{ $may->id }}"
                                                @if ($may->id == $loi->may_id) selected @endif>
                                                {{ $may->so_may }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <label>Tên lỗi</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="TenLoi" id="" cols="165" rows="10">{{ $loi->ten_loi }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Sửa lỗi</button>
                                </div>
                            </div>
                    </div>

                </div>

                </form>
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

        function disable() {
            $a = document.getElementById("checkBox1").checked = true;
            $b = document.getElementById("checkBox2").checked = true;
            if ($a == true) {
                $b = !$b;
            } else if ($a == false) {
                $b = $b;
            } else if ($b == true) {
                $a = !$a;
            } else if ($b == false) {
                $a = !$a;
            }
            // document.getElementById("checkBox1").checked = true;
        }

        // function undisable() {
        //     $a = document.getElementById("checkBox1").checked = true;
        //     $b = document.getElementById("checkBox2").checked;
        //     if ($a == true) {
        //         $b = false;
        //     }
        // }
    </script>
    {{-- <script>

    </script> --}}

@endsection

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
                    <div class="card-header">
                        <h5 class="card-title">Sửa Lỗi</h5>
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
                                        <input disabled type="text" name="TaiKhoan" class="form-control"
                                            placeholder="Tài Khoản" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tình Trạng</label> <br />
                                        @if ($loi->tinh_trang_loi === 'Chưa sửa')
                                            <input type="checkbox" name="checkBox[]" value="Chưa sửa" checked="">
                                            Chưa
                                            sửa<br />
                                        @else
                                            <input type="checkbox" name="checkBox[]" value="Đã sửa"> Đã sửa <br />
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tên Lỗi</label>
                                    <div class="form-group">
                                        <input type="text" name="TenLoi" class="form-control" placeholder="Tên Lỗi"
                                            value="{{ $loi->ten_loi }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Thời Gian</label>
                                    <div class="form-group">
                                        <input type="date" name="ThoiGian" class="form-control" placeholder="Thời Gian"
                                            value="{{ $loi->thoi_gian }}">
                                    </div>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="col-md-6">
                                    <label>Phòng</label>
                                    <select name="Phong" id="" class="form-control">
                                        <option value="">-- Chọn Phòng--</option>
                                        @foreach ($lstPhongHoc as $phongHoc)
                                            <option value="{{ $phongHoc->id }}"
                                                @if ($phongHoc->id == $loi->phong_id) selected @endif>
                                                {{ $phongHoc->ten_phong }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Số Máy</label>
                                    <select name="May" id="" class="form-control">
                                        <option value="">-- Chọn Máy--</option>
                                        @foreach ($lstMay as $may)
                                            <option value="{{ $may->id }}"
                                                @if ($may->id == $loi->may_id) selected @endif>
                                                {{ $may->so_may }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 pr-1">

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Sửa tài khoản</button>
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
    </script>
    {{-- <script>

    </script> --}}

@endsection

@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang thêm lỗi')
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
                                <h5 class="card-title"> Thêm Lỗi</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('loi.index') }}" class="">
                                    <button class="btn btn-success"> <i class="fas fa-reply"></i> Trở về</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('loi.store') }}" method="post" enctype="multipart/form-data">
                            {!! @csrf_field() !!}
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <label>Phòng</label>
                                    <select name="Phong" id="" class="form-control">
                                        <option value="">-- Chọn phòng--</option>
                                        @foreach ($lstPhongHoc as $phongHoc)
                                            <option value="{{ $phongHoc->id }}">{{ $phongHoc->ten_phong }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <label>Máy</label>
                                    <select name="May" id="" class="form-control">
                                        <option value="">-- Chọn Máy--</option>
                                        @foreach ($lstMay as $may)
                                            <option value="{{ $may->id }}">{{ $may->so_may }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Thời gian</label>
                                        <input type="date" name="ThoiGian" class="form-control" min="1"
                                            placeholder="Thời gian">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <input type="checkbox" name="checkBox[]" value="Chưa sửa"> Chưa sửa <br />
                                    <input type="checkbox" name="checkBox[]" value="Đã sửa"> Đã sửa <br />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-1"><br>
                                    <label>Ghi chú lỗi</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="TenLoi" id="" cols="165" rows="10"></textarea>
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
    </script>
@endsection

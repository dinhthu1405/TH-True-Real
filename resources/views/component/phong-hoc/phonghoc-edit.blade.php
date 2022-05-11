@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang sửa phòng học')
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

                        <h5 style="margin-top: 10px" class="card-title">Sửa Phòng Học</h5>
                        <a href="{{ route('phongHoc.index') }}">
                            <button type="button" style="margin-left: 625px;" class="btn btn-danger btn-round">Trở về danh
                                sách</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('phongHoc.update', ['phongHoc' => $phongHoc]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-3 pr-1">
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Tên phòng</label>
                                        <input type="text" name="TenPhong" class="form-control"
                                            placeholder="Tên phòng học" value="{{ $phongHoc->ten_phong }}">
                                    </div>
                                </div>
                                <div class="col-md-3 pr-1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                </div>
                                <div class="col-md-3 pr-1">
                                    <button type="submit" class="btn btn-primary btn-round">Sửa phòng học</button>
                                </div>
                                <div class="col-md-4 pr-1">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

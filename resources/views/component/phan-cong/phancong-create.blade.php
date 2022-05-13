@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang thêm phân công')
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
                                <h5 class="card-title">Thêm Phân Công</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('phanCong.index') }}" class="">
                                    <button class="btn btn-success"> <i class="fas fa-reply"></i> Trở về</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('phanCong.store') }}" method="post" enctype="multipart/form-data">
                            {!! @csrf_field() !!}

                            <div class="row">
                                <div class="col-md-4">
                                    <label>Phòng</label>
                                    <select name="TenPhong" id="" class="form-control">
                                        <option value="">-- Chọn phòng--</option>
                                        @foreach ($lstPhongHoc as $phongHoc)
                                            <option value="{{ $phongHoc->id }}">{{ $phongHoc->ten_phong }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 pr-1">

                                    <label>Tên Người Trực</label>
                                    <select name="TenNguoiTruc" id="" class="form-control">
                                        <option value="">-- Chọn Người Trực--</option>
                                        @foreach ($lstUser as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->ho_ten }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-4 pr-1">
                                    <label>Chọn Ca</label>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input type="checkbox" name="checkBox[]" value="1"> 1 <br />
                                                <input type="checkbox" name="checkBox[]" value="2"> 2 <br />
                                            </div>
                                            <div class="col">
                                                <input type="checkbox" name="checkBox[]" value="3"> 3 <br />
                                                <input type="checkbox" name="checkBox[]" value="4"> 4 <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Ngày bắt đầu</label>
                                        <input type="date" name="NgayBatDau" class="form-control"
                                            placeholder="Ngày bắt đầu">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Ngày kết thúc</label>
                                        <input type="date" name="NgayKetThuc" class="form-control"
                                            placeholder="Ngày kết thúc">
                                    </div>
                                </div>
                            </div>

                            {{--  --}}
                            <br>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Thêm Ca Trực</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

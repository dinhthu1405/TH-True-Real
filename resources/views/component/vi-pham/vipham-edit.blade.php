@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang sửa máy')
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
                                <h5 class="card-title">Sửa Vi Phạm</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('viPham.index') }}" class="">
                                    <button class="btn btn-success"> <i class="fas fa-reply"></i> Trở về</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('viPham.update', ['viPham' => $viPham]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12 pr-1">
                                    <div class="form-group">
                                        <label>Lỗi Vi Phạm</label>
                                        <input type="text" name="LoiViPham" class="form-control" placeholder="Lỗi Vi Phạm"
                                            value="{{ $viPham->loi_vi_pham }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Tên Người Vi Phạm</label>
                                        <select name="TenNguoiTruc" id="" class="form-control">
                                            <option value="">-- Chọn Người Vi Phạm--</option>
                                            @foreach ($lstUser as $user)
                                                <option value="{{ $user->id }}"
                                                    @if ($user->id == $viPham->user_id) selected @endif>
                                                    {{ $user->ho_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Thời Gian</label>
                                        <input type="date" name="ThoiGian" class="form-control"
                                            value="{{ $viPham->thoi_gian }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row"><br>
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Sửa V Phạm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

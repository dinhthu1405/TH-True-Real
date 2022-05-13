@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang thêm máy')
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
                                <h5 class="card-title">Thêm Vi Phạm</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('viPham.index') }}" class="">
                                    <button class="btn btn-success"> <i class="fas fa-reply"></i> Trở về</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('viPham.store') }}" method="post" enctype="multipart/form-data">
                            {!! @csrf_field() !!}
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Lỗi Vi Phạm</label>
                                        <input type="text" name="LoiViPham" class="form-control"
                                            placeholder="Tên Vi Phạm">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <label>Tên Người Vi Phạm</label>
                                    <select name="TenNguoiViPham" id="" class="form-control">
                                        <option value="">-- Chọn Người Vi Phạm--</option>
                                        @foreach ($lstUser as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->ho_ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Thời Gian</label>
                                        <input type="date" name="ThoiGian" class="form-control" placeholder="Thời Gian">
                                    </div>
                                </div>

                            </div>
                            {{--  --}}
                            <br>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Thêm Vi Phạm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

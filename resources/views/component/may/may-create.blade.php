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
                                <h5 class="card-title">Thêm Máy</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('may.index') }}" class="">
                                    <button class="btn btn-success"> <i class="fas fa-reply"></i> Trở về</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('may.store') }}" method="post" enctype="multipart/form-data">
                            {!! @csrf_field() !!}
                            <div class="row">
                                <div class="col-md-3 pr-1">
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Số máy</label>
                                        <input type="text" name="SoMay" class="form-control" placeholder="Số máy">
                                    </div>
                                </div>
                                <div class="col-md-3 pr-1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 pr-1">
                                </div>
                                <div class="col-md-6 pr-1">
                                    <label>Phòng</label>
                                    <select name="Phong" id="" class="form-control">
                                        <option value="">-- Chọn phòng--</option>
                                        @foreach ($lstPhongHoc as $phongHoc)
                                            <option value="{{ $phongHoc->id }}">{{ $phongHoc->ten_phong }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 pr-1">
                                </div>
                            </div>
                            {{--  --}}
                            <br>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Thêm máy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

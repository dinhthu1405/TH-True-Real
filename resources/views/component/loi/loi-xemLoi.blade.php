@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang quản lí lỗi')
@section('content')
    @if ($lstLoi->isNotEmpty())
        <section class="content" style="padding-left: 2%; padding-bottom: 2%">
            <form action="#" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <input class="form-control" type="search" name="search" required />
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="form-control btn btn-primary"><i class="fas fa-search fa-fw"></i> Tìm
                            kiếm</button>
                    </div>
                </div>
            </form>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="row">
                            <div class="col-md-10">
                                <h4 style="padding-top: 25px; padding-left: 25px" class="card-title">Thông Tin Lỗi
                                </h4>
                            </div>
                            <div style="padding-top: 18px" class="col-md-2">
                                <a href="{{ route('loi.themLoi') }}" class="">
                                    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Lỗi</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table" style="text-align: center;">
                                    <thead class="text-primary">
                                        <th>Tên lỗi</th>
                                        <th>Thời gian</th>
                                        <th>Phòng</th>
                                        <th>Số máy</th>
                                        <th>Tài khoản</th>
                                        <th>Tình trạng lỗi</th>
                                    </thead>
                                    @foreach ($lstLoi as $loi)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loi->ten_loi }}</td>
                                                <td>{{ $loi->thoi_gian }}</td>
                                                <td>{{ $loi->phongHoc->ten_phong }}</td>
                                                <td>{{ $loi->may->so_may }}</td>
                                                <td>{{ $loi->user->email }}</td>
                                                <td>{{ $loi->tinh_trang_loi }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="row">
            <div class="col-md-10">
                <h2 style="padding-left: 2%">Không tìm thấy lỗi nào</h2>
            </div>
            <div class="col-md-2">
                <a href="{{ route('loi.themLoi') }}" class="">
                    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Lỗi</button>
                </a>
            </div>
        </div>
    @endif
@endsection

@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang thống kê')
@section('content')

    {{-- @if ($lstThongKe->isNotEmpty()) --}}
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
                            <h4 style="padding-top: 25px; padding-left: 45%; text-decoration-line: underline; font-weight: bold"
                                class="card-title">Thông Tin
                                Bảng
                                Thống Kê
                            </h4>
                        </div>
                        {{-- <div style="padding-top: 18px" class="col-md-2">
                            <a href="#" class="">
                                <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Thống Kê</button>
                            </a>
                        </div> --}}
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <table class="table" style="text-align: center;">
                                <thead class="text-primary">
                                    <th>Phòng Máy</th>
                                    <th>Số Máy Lỗi</th>
                                    <th>Thời gian</th>
                                    <th>Xóa</th>
                                    <th>Sửa</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @else
        <div class="row">
            <div class="col-md-10">
                <h2 style="padding-left: 2%">Không tìm thấy thống kê nào</h2>
            </div>
            <div class="col-md-2">
                <a href="" class="">
                <a href="#" class="">
                    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Vi Thống Kê</button>
                </a>
            </div>
        </div>
    @endif --}}
@endsection

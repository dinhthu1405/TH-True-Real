@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang quản lí máy')
@section('content')


    @if ($lstMay->isNotEmpty())
        <section class="content" style="padding-left: 2%; padding-bottom: 2%">
            <form action="{{ route('may.search') }}" method="post">
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
                                <h4 style="padding-top: 25px; padding-left: 25px" class="card-title">Thông Tin Máy</h4>
                            </div>
                            <div style="padding-top: 18px" class="col-md-2">
                                <a href="{{ route('may.create') }}" class="">
                                    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Máy</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <table class="table" style="text-align: center;">
                                    <thead class="text-primary">
                                        {{-- <th>Tên tài khoản</th> --}}
                                        <th>Phòng</th>
                                        <th>Số máy</th>
                                        <th>Xóa</th>
                                        <th>Sửa</th>
                                    </thead>
                                    @foreach ($lstMay as $may)
                                        <tbody>
                                            <tr>
                                                {{-- <td>{{ $may->ho_ten }}</td> --}}
                                                <td>{{ $may->phongHoc->ten_phong }}</td>
                                                <td>{{ $may->so_may }}</td>

                                                <td>
                                                    <a href="{{ route('may.xoa', $may->id) }}"
                                                        onclick="return confirm('Bạn có chắc muốn xoá máy này')"><button
                                                            class="btn btn-danger" type="submit">Xóa</button></a>
                                                    <!-- </a> -->
                                                </td>
                                                <td><a href="{{ route('may.edit', $may->id) }}"><button
                                                            class="btn btn-warning">Sửa</button></a></td>
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
                <h2 style="padding-left: 2%">Không tìm thấy máy nào</h2>
            </div>
            <div class="col-md-2">
                <a href="{{ route('may.create') }}" class="">
                    <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Máy</button>
                </a>
            </div>
        </div>
    @endif
@endsection

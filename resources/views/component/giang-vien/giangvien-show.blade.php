@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang quản lí giảng viên')
@section('content')

    @if (Auth::user()->phan_quyen == 1)
        @if ($lstGiangVien->isNotEmpty())
            <section class="content" style="padding-left: 2%; padding-bottom: 2%">
                <form action="{{ route('giangVien.search') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <input class="form-control" type="search" name="search" value="" required />
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
                                    <h4 style="padding-top: 25px; padding-left: 25px" class="card-title">Thông Tin Giảng
                                        Viên
                                    </h4>
                                </div>
                                <div style="padding-top: 18px" class="col-md-2">
                                    <a href="{{ route('giangVien.create') }}" class="">
                                        <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Giảng
                                            Viên</button>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <table class="table" style="text-align: center;">
                                        <thead class="text-primary">
                                            <th>Tên lớp</th>
                                            <th>Xóa</th>
                                            <th>Sửa</th>
                                        </thead>
                                        @foreach ($lstGiangVien as $giangVien)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $giangVien->ten_giang_vien }}</td>
                                                    <td>
                                                        <a href="{{ route('giangVien.xoa', $giangVien->id) }}"
                                                            onclick="return confirm('Bạn có chắc muốn xoá giảng viên này')"><button
                                                                class="btn btn-danger" type="submit"><i
                                                                    class="fas fa-trash-alt"></i></button></a>
                                                        <!-- </a> -->
                                                    </td>
                                                    <td><a href="{{ route('giangVien.edit', $giangVien->id) }}"><button
                                                                class="btn btn-warning"><i
                                                                    class="fas fa-pencil-alt"></i></button></a></td>
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
                    <h2 style="padding-left: 2%">Không tìm thấy giảng viên này</h2>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('giangVien.create') }}" class="">
                        <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Giảng Viên</button>
                    </a>
                </div>
            </div>
        @endif
    @endif
@endsection

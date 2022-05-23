@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang quản lí phòng học')
@section('content')


    @if (Auth::user()->phan_quyen == 1)

        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif

        @if ($lstPhongHoc->isNotEmpty())

            <section class="content" style="padding: 20px">
                {{-- <form action="{{ route('phongHoc.search') }}" method="post"> --}}
                <form action="{{ route('phongHoc.search') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <input class="form-control" type="search" name="search" required />
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="form-control btn btn-primary"><i class="fas fa-search fa-fw"></i>
                                Tìm kiếm</button>
                        </div>
                        <div class="col-md-6">
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
                                    <h4 style="padding-top: 25px; padding-left: 25px" class="card-title">Thông Tin Phòng
                                        Học
                                    </h4>
                                </div>
                                <div style="padding-top: 18px" class="col-md-2">
                                    <a href="{{ route('phongHoc.create') }}" class="">
                                        <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Phòng</button>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <table class="table" style="text-align: center;">
                                        <thead class="text-primary">
                                            <th>Tên phòng</th>
                                            <th>Xóa</th>
                                            <th>Sửa</th>
                                        </thead>
                                        @foreach ($lstPhongHoc as $phongHoc)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $phongHoc->ten_phong }}</td>
                                                    <td>
                                                        <a href="{{ route('phongHoc.xoa', $phongHoc->id) }}"
                                                            onclick="return confirm('Bạn có chắc muốn xoá phòng học này')"><button
                                                                class="btn btn-danger" type="submit"><i
                                                                    class="fas fa-trash-alt"></i></button></a>

                                                    </td>
                                                    <td><a href="{{ route('phongHoc.edit', $phongHoc->id) }}"><button
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
                    <h2 style="padding-left: 2%">Không tìm thấy phòng học nào</h2>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('phongHoc.create') }}" class="">
                        <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Phòng</button>
                    </a>
                </div>
            </div>
        @endif
    @endif
@endsection

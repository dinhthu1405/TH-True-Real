@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang quản lí tài khoản')
@section('content')

    @if (Auth::user()->phan_quyen == 1)
        @if ($lstTaiKhoan->isNotEmpty())
            <section class="content" style="padding-left: 2%; padding-bottom: 2%">
                <form action="{{ route('taiKhoan.search') }}" method="post">
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
                                    <h4 style="padding-top: 25px; padding-left: 25px" class="card-title">Thông Tin Tài
                                        Khoản
                                    </h4>
                                </div>
                                <div style="padding-top: 18px" class="col-md-2">
                                    <a href="{{ route('taiKhoan.create') }}" class="">
                                        <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Tài
                                            Khoản</button>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <table class="table" style="text-align: center;">
                                        <thead class="text-primary">
                                            <th>Ảnh đại diện</th>
                                            <th>Email</th>
                                            <th>Họ và Tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Ngày Sinh</th>
                                            <th>Loại Tài Khoản</th>
                                            <th>Khóa</th>
                                            <th>Sửa</th>
                                        </thead>
                                        @foreach ($lstTaiKhoan as $taiKhoan)
                                            @if ($taiKhoan->trang_thai == 0)
                                                <tbody style="background-color: darkgrey">
                                                    <tr>
                                                        <td><img style="vertical-align: middle; width: 50px; height: 50px; border-radius: 50%;"
                                                                src="{{ asset("$taiKhoan->hinh_anh") }}" alt="">
                                                        </td>
                                                        <td>{{ $taiKhoan->email }}</td>
                                                        <td>{{ $taiKhoan->ho_ten }}</td>
                                                        <td>{{ $taiKhoan->sdt }}</td>
                                                        <td>{{ $taiKhoan->ngay_sinh }}</td>
                                                        @if ($taiKhoan->phan_quyen == 1)
                                                            <td>Người quản trị</td>
                                                        @else
                                                            <td>Người dùng</td>
                                                        @endif

                                                        {{-- <td>{{ $taiKhoan->phongHocs->ten_phong }}</td> --}}
                                                        <td>
                                                            <a href="{{ route('taiKhoan.xoa', $taiKhoan->id) }}"
                                                                onclick="return confirm('Bạn có chắc muốn mở khoá tài khoản này')"><button
                                                                    class="btn btn-success" type="submit"><i
                                                                        class="fa fa-unlock"></i></button></a>
                                                            <!-- </a> -->
                                                        </td>
                                                        <td><a href="{{ route('taiKhoan.edit', $taiKhoan->id) }}"><button
                                                                    class="btn btn-warning"><i
                                                                        class="fas fa-pencil-alt"></i></button></a></td>
                                                    </tr>
                                                </tbody>
                                            @else
                                                <tbody>
                                                    <tr>
                                                        <td><img style=" vertical-align: middle; width: 50px; height: 50px; border-radius: 50%;"
                                                                src="{{ asset("$taiKhoan->hinh_anh") }}" alt="">
                                                        </td>

                                                        <td>{{ $taiKhoan->email }}</td>
                                                        <td>{{ $taiKhoan->ho_ten }}</td>
                                                        <td>{{ $taiKhoan->sdt }}</td>
                                                        <td>{{ $taiKhoan->ngay_sinh }}</td>
                                                        @if ($taiKhoan->phan_quyen == 1)
                                                            <td>Người quản trị</td>
                                                        @else
                                                            <td>Người dùng</td>
                                                        @endif
                                                        {{-- <td>{{ $taiKhoan->phongHocs->ten_phong }}</td> --}}
                                                        {{-- @foreach ($taiKhoan->phongHocs as $phong)
                                                        <td>{{ $phong->created_at }}</td>
                                                    @endforeach --}}
                                                        @if ($taiKhoan->phan_quyen == 0)
                                                            <td>
                                                                <a href="{{ route('taiKhoan.xoa', $taiKhoan->id) }}"
                                                                    onclick="return confirm('Bạn có chắc muốn khoá tài khoản này')"><button
                                                                        class="btn btn-danger" type="submit"><i
                                                                            class="fa fa-lock"></i></button></a>
                                                            </td>
                                                        @else
                                                            <td>

                                                            </td>
                                                        @endif
                                                        <td><a href="{{ route('taiKhoan.edit', $taiKhoan->id) }}"><button
                                                                    class="btn btn-warning"><i
                                                                        class="fas fa-pencil-alt"></i></button></a></td>
                                                    </tr>
                                                </tbody>
                                            @endif
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
                    <h2 style="padding-left: 2%">Không tìm thấy tài khoản nào</h2>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('taiKhoan.create') }}" class="">
                        <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Tài Khoản</button>
                    </a>
                </div>
            </div>
        @endif
    @endif
@endsection

<!-- @push('scripts')
@endpush -->

@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang quản lí phân công')
@section('content')


    @if ($lstPhanCong->isNotEmpty())
        <section class="content" style="padding-left: 2%; padding-bottom: 2%">
            <form action="{{ route('phanCong.search') }}" method="post">
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
                                <h4 style="padding-top: 25px; padding-left: 25px" class="card-title">Thông Tin Phân Công
                                </h4>
                            </div>
                            @if (Auth::user()->phan_quyen == 1)
                                <div style="padding-top: 18px" class="col-md-2">
                                    <a href="{{ route('phanCong.create') }}" class="">
                                        <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Phân
                                            Công</button>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table" style="text-align: center;">
                                    <thead class="text-primary">
                                        <th>Tên người trực</th>
                                        <th>Ca</th>
                                        <th>Tên phòng</th>
                                        <th>Ngày bắt đầu trực</th>
                                        <th>Ngày kết thúc</th>
                                        {{-- <th>Tên lớp</th>
                                        <th>Tên giảng viên</th> --}}
                                        @if (Auth::user()->phan_quyen == 1)
                                            <th>Xóa</th>
                                            <th>Sửa</th>
                                        @endif
                                    </thead>
                                    @foreach ($lstPhanCong as $phanCong)
                                        <tbody>
                                            <tr>
                                                <td>

                                                    {{ $phanCong->users->ho_ten }}
                                                </td>
                                                <td>{{ $phanCong->ten_ca }}</td>
                                                <td>{{ Str::limit($phanCong->phongHocs->ten_phong, 15) }}</td>
                                                <td>{{ $phanCong->ngay_bat_dau }}</td>
                                                <td>{{ $phanCong->ngay_ket_thuc }}</td>
                                                {{-- <td>{{ Str::limit($phanCong->lopHocs->ten_lop, 15) }}</td>
                                                <td>{{ $phanCong->giangViens->ten_giang_vien }}</td> --}}
                                                @if (Auth::user()->phan_quyen == 1)
                                                    <td>
                                                        <a href="{{ route('phanCong.xoa', $phanCong->id) }}"
                                                            onclick="return confirm('Bạn có chắc muốn xoá ca học này, vì nó có thể ảnh hưởng đến ca học')"><button
                                                                class="btn btn-danger" type="submit">Xóa</button></a>
                                                        <!-- </a> -->
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('phanCong.edit', $phanCong->id) }}"><button
                                                                class="btn btn-warning">Sửa</button></a>
                                                    </td>
                                                @endif
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
                <h2 style="padding-left: 2%">Không tìm thấy phân công nào</h2>
            </div>
            @if (Auth::user()->phan_quyen == 1)
                <div class="col-md-2">
                    <a href="{{ route('phanCong.create') }}" class="">
                        <button class="btn btn-success"> <i class="fas fa-plus"></i> Thêm Phân Công</button>
                    </a>
                </div>
            @endif
        </div>
    @endif
@endsection

<!-- @push('scripts')
@endpush -->

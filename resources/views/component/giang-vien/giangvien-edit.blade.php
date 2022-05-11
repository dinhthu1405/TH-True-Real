@extends('layouts.app', ['pageId' => ''])

@section('title', 'Trang sửa giảng viên')
@section('content')
<?php //Hiển thị thông báo thành công?>
@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
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
                <h5 class="card-title">Sửa Giảng Viên</h5>
              </div>
              <div class="card-body">
                <form action="{{route('giangVien.update',['giangVien' => $giangVien])}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    <div class="col-md-3 pr-1">
                    </div>
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>Tên giảng viên</label>
                            <input type="text" name="TenGiangVien" class="form-control" placeholder="Tên giảng viên" value="{{$giangVien->ten_giang_vien}}">
                        </div>
                    </div>
                    <div class="col-md-3 pr-1">
                    </div>
                  </div>
                  <div class="row"><br >
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Sửa giảng viên</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

    </div>

@endsection

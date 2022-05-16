<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PhongHoc;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //Phương thức hỗ trợ load hình và thay thế bằng hình mặc định nếu không tìm thấy file
    protected function fixImage(User $taiKhoan)
    {
        //chạy lệnh sau: php artisan storage:link
        if (Storage::disk('public')->exists($taiKhoan->hinh_anh)) {
            $taiKhoan->hinh_anh = Storage::url($taiKhoan->hinh_anh);
        } else {
            $taiKhoan->hinh_anh = 'asset/img/pic-8.png';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
        $lstTaiKhoan = User::all();
        foreach ($lstTaiKhoan as $taiKhoan) {
            $this->fixImage($taiKhoan);
            //gọi fixImage cho từng sản phẩm, do lúc seed chỉ có dữ liệu giả
        }
        return view('component/tai-khoan/taikhoan-show', ['lstTaiKhoan' => $lstTaiKhoan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lstTaiKhoan = User::all();
        $lstPhong = PhongHoc::all();
        return view('component/tai-khoan/taikhoan-create', ['lstTaiKhoan' => $lstTaiKhoan, 'lstPhong' => $lstPhong]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(
            $request,
            [
                'Email' => 'required|email|unique:users',
                'MatKhau' => 'required|alphaNum|min:6',
                'HoTen' => 'required|max:255',
                // 'HinhAnh' => 'required',
                'SDT' => 'required|max:12',
                'NgaySinh' => 'required',
            ],
            [
                // 'Email.required' => 'required|email|unique:users',
                'Email.required' => 'Bạn chưa nhập Email',
                'Email.unique' => 'Email đã tồn tại',
                'MatKhau.required' => 'Bạn chưa nhập mật khẩu',
                'MatKhau.min' => 'Mật khẩu không được nhỏ hơn 6 ký tự',
                'SDT.required' => 'Bạn chưa nhập số điện thoại',
                'SDT.max' => 'Số điện thoại không được vượt quá 12 ký tự',
                'HoTen.max' => 'Họ tên không được vượt quá 255 ký tự',
                'HoTen.required' => 'Bạn chưa nhập họ & tên',
                'MatKhau.required' => 'Bạn chưa nhập mật khẩu',
                'NgaySinh.required' => 'Bạn chưa chọn ngày sinh',
            ]
        );
        $taiKhoan = new User();
        $taiKhoan->fill([
            'email' => $request->input('Email'),
            'password' => $request->input('MatKhau'),
            'hinh_anh' => '',
            'ho_ten' => $request->input('HoTen'),
            'sdt' => $request->input('SDT'),
            'ngay_sinh' => $request->input('NgaySinh'),
            'phan_quyen' => 0,
            'phong_id' => 1,
        ]);
        //dd($taiKhoan);

        // $taiKhoan = User::create(request(['MSSV', 'MatKhau','HoTen','SDT','phan_quyen','trang_thai']));


            $taiKhoan->save(); //lưu xong mới có mã địa danh
        if ($request->hasFile('images')) {
            $taiKhoan->hinh_anh = $request->file('images')->store('images/taiKhoan/' . $taiKhoan->id, 'public');
            $taiKhoan->save();
        }
        if($request->input('NgaySinh') > Carbon::now()) {
            return Redirect::back()->with('error', 'Nhập ngày sinh không hợp lệ');
        }
        // dd($taiKhoan);
        return Redirect::route('taiKhoan.index')->with('success', 'Thêm tài khoản thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaiKhoan  $TaiKhoan
     * @return \Illuminate\Http\Response
     */
    public function show(User $taiKhoan)
    {
        //
    }

    public function maneger($id)
    {
        //
        $taiKhoan=User::find($id);
        return view('component.tai-khoan.taikhoan-maneger', ['taiKhoan'=>$taiKhoan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $TaiKhoan
     * @return \Illuminate\Http\Response
     */
    public function edit(User $taiKhoan)
    {
        //
        return view('component/tai-khoan/taikhoan-edit', ['taiKhoan' => $taiKhoan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $TaiKhoan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $taiKhoan)
    {
        //
        $this->validate(
            $request,
            [
                'Email' => 'email|unique:users',
                'MatKhau' => 'required|alphaNum|min:6',
                'HoTen' => 'required|max:255',
                // 'HinhAnh' => 'required',
                'SDT' => 'required|max:12',
                'NgaySinh' => 'required',
            ],
            [
                // 'Email.required' => 'required|email|unique:users',

                'Email.unique' => 'Email đã tồn tại',
                'MatKhau.required' => 'Bạn chưa nhập mật khẩu',
                'MatKhau.min' => 'Mật khẩu không được nhỏ hơn 6 ký tự',
                'SDT.required' => 'Bạn chưa nhập số điện thoại',
                'SDT.max' => 'Số điện thoại không được vượt quá 12 ký tự',
                'HoTen.max' => 'Họ tên không được vượt quá 255 ký tự',
                'HoTen.required' => 'Bạn chưa nhập họ & tên',
                'MatKhau.required' => 'Bạn chưa nhập mật khẩu',
                'NgaySinh.required' => 'Bạn chưa chọn ngày sinh',
            ]
        );
        if ($request->hasFile('images')) {
            $taiKhoan->hinh_anh = $request->file('images')->store('images/taiKhoan/' . $taiKhoan->id, 'public');
        }
        // $isValid = password_verify($password, $hash);
        $taiKhoan->fill([
            'password' => $request->input('MatKhau'),
            'ho_ten' => $request->input('HoTen'),
            'sdt' => $request->input('SDT'),
            'ngay_sinh' => $request->input('NgaySinh'),
            'phan_quyen' => $request->input('PhanQuyen'),
        ]);
        $taiKhoan->save();
        // dd($taiKhoan);
        return Redirect::route('taiKhoan.index')->with('success', 'Sửa tài khoản thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaiKhoan  $TaiKhoan
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $taiKhoan)
    {
        //
    }

    public function xoa(Request $request, $id)
    {
        $taiKhoan = User::find($id);
        if ($taiKhoan->trang_thai == 0) {
            $taiKhoan->trang_thai = 1;
            $taiKhoan->save();
            return Redirect::route('taiKhoan.index');
        } else {
            $taiKhoan->trang_thai = 0;
            $taiKhoan->save();
            // Auth::logout();
            // $request->session()->invalidate();
            // $request->session()->regenerateToken();
            // return redirect('/login');
            return Redirect::route('taiKhoan.index');
        }
    }
}

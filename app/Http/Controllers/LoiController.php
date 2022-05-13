<?php

namespace App\Http\Controllers;

use App\Models\Loi;
use App\Models\May;
use App\Models\PhongHoc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class LoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstLoi = Loi::all()->where('trang_thai', 1);
        return view('component/loi/loi-show', ['lstLoi' => $lstLoi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lstPhongHoc = PhongHoc::all();
        $lstMay = May::all();
        $lstLoi = Loi::all();
        $lstUser = User::all();
        return view('component/loi/loi-create', ['lstLoi' => $lstLoi, 'lstPhongHoc' => $lstPhongHoc, 'lstMay' => $lstMay, 'lstUser' => $lstUser]);
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
        $loi = new Loi();
        $email = Auth::user()->id;
        $loi->fill([
            'ten_loi' => $request->input('TenLoi'),
            'thoi_gian' => $request->input('ThoiGian'),
            'user_id' => $email,
            'may_id' => $request->input('May'),
            'phong_id' => $request->input('Phong'),
            'tinh_trang_loi' => 'Chưa sửa',
        ]);
        $ktLoi = Loi::where([['ten_loi', $request->input('TenLoi')], ['phong_id', $request->input('Phong')], ['may_id', $request->input('May')]])->first();
        // return ($ktDiaDanh);

        if ($ktLoi) {
            return Redirect::back()->with('error', 'Lỗi đã tồn tại');
        } else {
            $loi->save(); //lưu xong mới có mã may
        }
        return Redirect::route('loi.index')->with('success', 'Thêm lỗi thành công');
    }

    // public function viPhamTaiKhoan()
    // {
    //     //
    //     $lstLoi = Loi::all();
    //     $lstUser = User::all();
    //     return view('component/loi/loi-create', ['lstLoi' => $lstLoi, 'lstPhongHoc' => $lstPhongHoc, 'lstMay' => $lstMay,'lstUser' => $lstUser]);
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loi  $loi
     * @return \Illuminate\Http\Response
     */
    public function show(Loi $loi)
    {
        //
    }

    public function xemLoi()
    {
        //
        $lstLoi = Loi::all()->where('trang_thai', 1);
        return view('component/loi/loi-xemLoi', ['lstLoi' => $lstLoi]);
    }

    public function themLoi()
    {
        //
        $lstPhongHoc = PhongHoc::all();
        $lstMay = May::all();
        $lstLoi = Loi::all();
        $lstUser = User::all();
        return view('component/loi/loi-themLoi', ['lstLoi' => $lstLoi, 'lstPhongHoc' => $lstPhongHoc, 'lstMay' => $lstMay, 'lstUser' => $lstUser]);
    }
    public function themLois(Request $request)
    {
        //
        $loi = new Loi();
        $email = Auth::user()->id;
        $loi->fill([
            'ten_loi' => $request->input('TenLoi'),
            'thoi_gian' => $request->input('ThoiGian'),
            'user_id' => $email,
            'may_id' => $request->input('May'),
            'phong_id' => $request->input('Phong'),
            'tinh_trang_loi' => implode(',', $request->input('checkBox')),
        ]);
        $ktLoi = Loi::where(['ten_loi', $request->input('TenLoi')], ['may_id', $request->input('May')], [['phong_id', $request->input('Phong')]])->first();
        // return ($ktDiaDanh);

        if ($ktLoi) {
            return Redirect::back()->with('error', 'Lỗi đã tồn tại');
        } else {
            $loi->save(); //lưu xong mới có mã may
        }
        return Redirect::route('loi.xemLoi')->with('success', 'Thêm lỗi thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loi  $loi
     * @return \Illuminate\Http\Response
     */
    public function edit(Loi $loi)
    {
        //
        $lstPhongHoc = PhongHoc::all();
        $lstMay = May::all();
        $lstLoi = Loi::all();
        return view('component/loi/loi-edit', ['lstLoi' => $lstLoi, 'lstPhongHoc' => $lstPhongHoc, 'lstMay' => $lstMay, 'loi' => $loi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loi  $loi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loi $loi)
    {
        //

        $loi->fill([
            'ten_loi' => $request->input('TenLoi'),
            'thoi_gian' => $request->input('ThoiGian'),
            'user_id' => $request->input('TaiKhoan'),
            'may_id' => $request->input('May'),
            'phong_id' => $request->input('Phong'),
            'tinh_trang_loi' => $request->input('radiobtn'),
        ]);
        // $ktLoi = Loi::where([['ten_loi', $request->input('TenLoi')], ['may_id', $request->input('May')], ['phong_id', $request->input('Phong')]])->first();
        // return ($ktDiaDanh);

        // if ($ktLoi) {
        //     return Redirect::back()->with('error', 'Lỗi đã tồn tại');
        // } else {
            $loi->save(); //lưu xong mới có mã may
        // }
        return Redirect::route('loi.index')->with('success', 'Thêm lỗi thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loi  $loi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loi $loi)
    {
        //
    }
    public function xoa($id)
    {
        $loi=Loi::find($id);
            $loi->trang_thai=0;
            $loi->save();
        return Redirect::route('loi.index');
    }
}

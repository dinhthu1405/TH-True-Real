<?php

namespace App\Http\Controllers;

use App\Models\Loi;
use Carbon\Carbon;
use App\Models\May;
use App\Models\PhongHoc;
use App\Models\GiangVien;
use App\Models\LopHoc;
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

    public function search(Request $request){
        $search = $request->input('search');
        $lstLoi = Loi::where('ten_loi','LIKE','%'.$search.'%')->orWhere('thoi_gian','LIKE','%'.$search.'%')->orWhere('tinh_trang_loi','LIKE','%'.$search.'%')->get();
// dd($lstLoi);
        return view('component/loi/loi-show', ['lstLoi'=>$lstLoi]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = Auth::user()->id;
        // $phongHoc=PhongHoc::find($id);
        $lstPhongHoc = PhongHoc::all();
        $lstMay = May::all();
        $lstGiangVien = GiangVien::all();
        $lstLopHoc = LopHoc::all();
        $lstLoi = Loi::all();
        $lstUser = User::all();
        return view('component/loi/loi-create', compact('lstPhongHoc','lstMay','lstGiangVien','lstLopHoc','lstLoi','lstUser'));
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
                'TenLoi' => 'required|max:255',
                'ThoiGian' => 'required',
                'May' => 'required',
                'Phong' => 'required',
                'GiangVien'=>'required',
                'LopHoc'=>'required'
            ],
            [
                // 'MSSV.MSSV' => 'MSSV không đúng định dạng',
                'TenLoi.required' => 'Chưa nhập tên lỗi',
                'TenLoi.max' => 'Tên lỗi không quá 255 kí tự',
                'ThoiGian.required' => 'Chưa chọn thời gian',

                'May.required' => 'Chưa chọn máy',
                'Phong.required' => 'Chưa chọn phòng',
                'GiangVien.required' => 'Chưa chọn giảng viên',
                'LopHoc.required' => 'Chưa chọn lớp học',
            ]
        );
        $loi = new Loi();
        $email = Auth::user()->id;
        $loi->fill([
            'ten_loi' => $request->input('TenLoi'),
            'thoi_gian' => $request->input('ThoiGian'),
            'user_id' => $email,
            'may_id' => $request->input('May'),
            'phong_id' => $request->input('Phong'),
            'giang_vien_id' => $request->input('GiangVien'),
            'lop_hoc_id' => $request->input('LopHoc'),
            'tinh_trang_loi' => 'Chưa sửa',
        ]);
        $ktLoi = Loi::where([['ten_loi', $request->input('TenLoi')], ['may_id', $request->input('May')],['phong_id', $request->input('Phong')],['thoi_gian', $request->input('ThoiGian')]])->first();
        if($request->input('ThoiGian') > Carbon::now()) {
            return Redirect::back()->with('error', 'Nhập thời gian không hợp lệ');
        }
        else if($ktLoi){

            return Redirect::back()->with('error', 'Lỗi đã tồn tại');
        }
        else{
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
        $ktLoi = Loi::where([['ten_loi', $request->input('TenLoi')], ['may_id', $request->input('May')],['phong_id', $request->input('Phong')],['thoi_gian', $request->input('ThoiGian')]])->first();
        // return ($ktDiaDanh);
// dd($request->input('ThoiGian') > Carbon::now());
        if($request->input('ThoiGian') > Carbon::now()) {
            return Redirect::back()->with('error', 'Nhập thời gian không hợp lệ');
        }
        else if($ktLoi){

            return Redirect::back()->with('error', 'Lỗi đã tồn tại');
        }
        else{
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
        $this->validate(
            $request,
            [
                'TenLoi' => 'required|max:255',
                'GiangVien'=>'required',
                'LopHoc'=>'required'
            ],
            [
                'TenLoi.required' => 'Chưa nhập tên lỗi',
                'TenLoi.max' => 'Tên lỗi không quá 255 kí tự',
                'GiangVien.required' => 'Chưa chọn giảng viên',
                'LopHoc.required' => 'Chưa chọn lớp học',
            ]
        );
        $loi->fill([
            'ten_loi' => $request->input('TenLoi'),
            'thoi_gian' => $request->input('ThoiGian'),
            'user_id' => $request->input('TaiKhoan'),
            'may_id' => $request->input('May'),
            'phong_id' => $request->input('Phong'),
            'giang_vien_id' => $request->input('GiangVien'),
            'lop_hoc_id' => $request->input('LopHoc'),
            'tinh_trang_loi' => $request->input('radiobtn'),
        ]);
        // dd($loi);
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

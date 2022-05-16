<?php

namespace App\Http\Controllers;

use App\Models\PhanCong;
use App\Models\User;
use App\Models\PhongHoc;
use App\Models\GiangVien;
use App\Models\LopHoc;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PhanCongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstPhanCong=PhanCong::all()->where('trang_thai', 1);

        return View('component/phan-cong/phancong-show', ['lstPhanCong'=>$lstPhanCong]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lstUser=User::all();
        $lstPhanCong=PhanCong::all();
        $lstPhongHoc=PhongHoc::all();
        // $lstGiangVien=GiangVien::all();
        // $lstLop=LopHoc::all();
        return view('component/phan-cong/phancong-create',['lstPhanCong'=>$lstPhanCong,'lstPhongHoc'=>$lstPhongHoc,'lstUser'=>$lstUser]);
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
                'NgayBatDau' => 'required',
                'NgayKetThuc' => 'required',
                'TenNguoiTruc' => 'required',
                'checkBox' => 'required',
                'TenPhong' => 'required',
            ],
            [
                'NgayBatDau.required' => 'Chưa chọn thời gian bắt đầu',
                'NgayKetThuc.required' => 'Chưa chọn thời gian kết thúc',
                'TenNguoiTruc.required' => 'Chưa chọn người trực',
                'checkBox.required' => 'Chưa chọn ca',
                'TenPhong.required' => 'Chưa chọn phòng trực',
            ]
        );


        $phanCong = new PhanCong();
        $phanCong->fill([
        'ngay_bat_dau'=> $request->input('NgayBatDau'),
        'ngay_ket_thuc'=> $request->input('NgayKetThuc'),
        'user_id'=> $request->input('TenNguoiTruc'),
        'ten_ca' => implode(",",$request->input('checkBox')),
        'phong_id'=> $request->input('TenPhong'),
        //  'lop_id'=> $request->input('TenLop'),
        //  'giang_vien_id'=> $request->input('TenGiangVien'),

        ]);
        // dd($request->input('NgayBatDau') >= Carbon::now());
        // if($request->input('NgayBatDau') < Carbon::now()) {
        //     return Redirect::back()->with('error', 'Nhập ngày bắt đầu không hợp lệ');
        // } else
        if($request->input('NgayBatDau') > $request->input('NgayKetThuc')){
            return Redirect::back()->with('error', 'Ngày kết thúc phải lớn hơn ngày bắt đầu');
        }
else{
    $phanCong->save();
    return Redirect::route('phanCong.index')->with('success', 'Thêm ca thành công');
}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhanCong  $phanCong
     * @return \Illuminate\Http\Response
     */
    public function show(PhanCong $phanCong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhanCong  $phanCong
     * @return \Illuminate\Http\Response
     */
    public function edit(PhanCong $phanCong)
    {
        //
        $lstUser=User::all();
        $lstPhanCong=PhanCong::all();
        $lstPhongHoc=PhongHoc::all();
        // $lstGiangVien=GiangVien::all();
        return view('component/phan-cong/phancong-edit',['phanCong'=>$phanCong,'lstUser'=>$lstUser,'lstPhanCong'=>$lstPhanCong,'lstPhongHoc'=>$lstPhongHoc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhanCong  $phanCong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhanCong $phanCong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhanCong  $phanCong
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhanCong $phanCong)
    {
        //
    }
    public function xoa($id)
    {
        $phanCong=PhanCong::find($id);
            $phanCong->trang_thai=0;
            $phanCong->save();
        return Redirect::route('phanCong.index');
    }
}

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

    public function search(Request $request){
        $search = $request->input('search');
        $lstPhanCong = PhanCong::where('ten_ca','LIKE','%'.$search.'%')->orWhere('ngay_bat_dau','LIKE','%'.$search.'%')->get();
        return view('component/phan-cong/phancong-show', ['lstPhanCong'=>$lstPhanCong]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lstUser=User::all()->where('phan_quyen',0);
        $lstPhanCong=PhanCong::all()->where('trang_thai',1);
        $lstPhongHoc=PhongHoc::all()->where('trang_thai',1);
        // $lstGiangVien=GiangVien::all()->where('trang_thai',1);
        // $lstLopHoc=LopHoc::all()->where('trang_thai',1);
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
                'NgayBatDau.required' => 'Ch??a ch???n th???i gian b???t ?????u',
                'NgayKetThuc.required' => 'Ch??a ch???n th???i gian k???t th??c',
                'TenNguoiTruc.required' => 'Ch??a ch???n ng?????i tr???c',
                'checkBox.required' => 'Ch??a ch???n ca',
                'TenPhong.required' => 'Ch??a ch???n ph??ng tr???c',
            ]
        );


        $phanCong = new PhanCong();
        $phanCong->fill([
        'ngay_bat_dau'=> $request->input('NgayBatDau'),
        'ngay_ket_thuc'=> $request->input('NgayKetThuc'),
        'user_id'=> $request->input('TenNguoiTruc'),
        'ten_ca' => implode(",",$request->input('checkBox')),
        'phong_hoc_id'=> $request->input('TenPhong'),

        ]);
        // dd($request->input('NgayBatDau') >= Carbon::now());
        // if($request->input('NgayBatDau') < Carbon::now()) {
        //     return Redirect::back()->with('error', 'Nh???p ng??y b???t ?????u kh??ng h???p l???');
        // } else
        if($request->input('NgayBatDau') > $request->input('NgayKetThuc')){
            return Redirect::back()->with('error', 'Ng??y k???t th??c ph???i l???n h??n ng??y b???t ?????u');
        }
else{
    $phanCong->save();
    return Redirect::route('phanCong.index')->with('success', 'Th??m ph??n c??ng th??nh c??ng');
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
                'NgayBatDau.required' => 'Ch??a ch???n th???i gian b???t ?????u',
                'NgayKetThuc.required' => 'Ch??a ch???n th???i gian k???t th??c',
                'TenNguoiTruc.required' => 'Ch??a ch???n ng?????i tr???c',
                'checkBox.required' => 'Ch??a ch???n ca',
                'TenPhong.required' => 'Ch??a ch???n ph??ng tr???c',
            ]
        );

        $phanCong->fill([
        'ngay_bat_dau'=> $request->input('NgayBatDau'),
        'ngay_ket_thuc'=> $request->input('NgayKetThuc'),
        'user_id'=> $request->input('TenNguoiTruc'),
        'ten_ca' => implode(",",$request->input('checkBox')),
        'phong_hoc_id'=> $request->input('TenPhong'),

        ]);
        // dd($request->input('NgayBatDau') >= Carbon::now());
        // if($request->input('NgayBatDau') < Carbon::now()) {
        //     return Redirect::back()->with('error', 'Nh???p ng??y b???t ?????u kh??ng h???p l???');
        // } else
        if($request->input('NgayBatDau') > $request->input('NgayKetThuc')){
            return Redirect::back()->with('error', 'Ng??y k???t th??c ph???i l???n h??n ng??y b???t ?????u');
        }
else{
    $phanCong->save();
    return Redirect::route('phanCong.index')->with('success', 'S???a ca th??nh c??ng');
}
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

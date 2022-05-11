<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GiangVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstGiangVien = GiangVien::all()->where('trang_thai',1);
        return view('component/giang-vien/giangvien-show', ['lstGiangVien'=>$lstGiangVien]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lstGiangVien=GiangVien::all();
        return view('component/giang-vien/giangvien-create',['lstGiangVien'=>$lstGiangVien]);
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
        $giangVien= new GiangVien();
        $giangVien->fill([
            'ten_giang_vien'=>$request->input('TenGiangVien'),
        ]);
        $ktGiangVien=GiangVien::where('ten_giang_vien',$request->input('TenGiangVien'))->first();
        // return ($ktDiaDanh);
        if($ktGiangVien){
            return Redirect::back()->with('error','Giảng viên đã tồn tại');
        }
        else{
            $giangVien->save();//lưu xong mới có mã phòng
        }
        return Redirect::route('giangVien.index')->with('success','Thêm giảng viên thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GiangVien  $giangVien
     * @return \Illuminate\Http\Response
     */
    public function show(GiangVien $giangVien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GiangVien  $giangVien
     * @return \Illuminate\Http\Response
     */
    public function edit(GiangVien $giangVien)
    {
        //
        $lstGiangVien=GiangVien::all();
        return view('component/giang-vien/giangvien-edit',['giangVien'=>$giangVien,'lstGiangVien'=>$lstGiangVien]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GiangVien  $giangVien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GiangVien $giangVien)
    {
        //
        $giangVien->fill([
            'ten_giang_vien'=>$request->input('TenGiangVien'),
        ]);
        $ktGiangVien=GiangVien::where([['id',$giangVien->id], ['ten_giang_vien',$request->input('TenGiangVien')]])->first();
        if(!$ktGiangVien){
            $giangVien->save();
            return Redirect::route('giangVien.index')->with('success','Sửa giảng viên thành công');
        }
        else{
            return Redirect::back()->with('error','Tên giảng viên đã tồn tại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GiangVien  $giangVien
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiangVien $giangVien)
    {
        //
    }

    public function xoa($id)
    {
        $giangVien=GiangVien::find($id);
            $giangVien->trang_thai=0;
            $giangVien->save();
        return Redirect::route('giangVien.index');
    }
}
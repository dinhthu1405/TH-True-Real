<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhongHoc;

class PhongHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstPhongHoc=PhongHoc::all()->where('trang_thai',1)->sortBy(['ten_phong', 'DESC']);
        return view('component/phong-hoc/phonghoc-show',['lstPhongHoc'=>$lstPhongHoc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lstPhongHoc=PhongHoc::all();
        return view('component/phong-hoc/phonghoc-create',['lstPhongHoc'=>$lstPhongHoc]);
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
                'TenPhong' => 'required',
            ],
            [
                'TenPhong.required' => 'Chưa nhập tên phòng',

            ]
        );
        $phongHoc= new PhongHoc();
        $phongHoc->fill([
            'ten_phong'=>$request->input('TenPhong'),
        ]);
        $ktTenPhong=PhongHoc::where('ten_phong',$request->input('TenPhong'))->first();
        // return ($ktDiaDanh);
        if($ktTenPhong){
            return Redirect::back()->with('error','Tên phòng đã tồn tại');
        }
        else{
            $phongHoc->save();//lưu xong mới có mã phòng
        }
        return Redirect::route('phongHoc.index')->with('success','Thêm tên phòng thành công');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PhongHoc $phongHoc)
    {
        //
        $lstPhongHoc=PhongHoc::all();
        return view('component/phong-hoc/phonghoc-edit',['phongHoc'=>$phongHoc,'lstPhongHoc'=>$lstPhongHoc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhongHoc $phongHoc)
    {
        $this->validate(
            $request,
            [
                'TenPhong' => 'required',
            ],
            [
                'TenPhong.required' => 'Chưa nhập tên phòng',

            ]
        );
        $phongHoc->fill([
            'ten_phong'=>$request->input('TenPhong'),
        ]);
        $ktPhongHoc=PhongHoc::where([['id',$phongHoc->id], ['ten_phong',$request->input('TenPhong')]])->first();
        if(!$ktPhongHoc){
            $phongHoc->save();
            return Redirect::route('phongHoc.index')->with('success','Sửa phòng học thành công');
        }
        else{
            return Redirect::back()->with('error','Tên phòng học đã tồn tại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function xoa($id)
    {
        $phongHoc=PhongHoc::find($id);
            $phongHoc->trang_thai=0;
            $phongHoc->save();
        return Redirect::route('phongHoc.index');
    }
}

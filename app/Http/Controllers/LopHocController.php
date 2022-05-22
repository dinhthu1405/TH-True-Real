<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class LopHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      if (Auth::user()->phan_quyen == 1){
        $lstLopHoc = LopHoc::all()->where('trang_thai',1);
        return view('component/lop-hoc/lophoc-show', ['lstLopHoc'=>$lstLopHoc]);
         }else{
                        abort('403', __('Bạn không có quyền vào trang này'));
                    }
    }

    public function search(Request $request){
        $search = $request->input('search');
        $lstLopHoc=LopHoc::where('ten_lop','LIKE','%'.$search.'%')->get();
    return view('component/lop-hoc/lophoc-show', compact('lstLopHoc'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user()->phan_quyen == 1){
            $lstLopHoc=LopHoc::all();
            return view('component/lop-hoc/lophoc-create',['lstLopHoc'=>$lstLopHoc]);
           }else{
                            abort('403', __('Bạn không có quyền vào trang này'));
                        }
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
                'TenLop' => 'required',
            ],
            [
                'TenLop.required' => 'Chưa nhập tên lớp học',

            ]
        );
        $lopHoc= new LopHoc();
        $lopHoc->fill([
            'ten_lop'=>$request->input('TenLop'),
        ]);
        $ktTenLop=LopHoc::where('ten_lop',$request->input('TenLop'))->first();
        // return ($ktDiaDanh);
        if($ktTenLop){
            return Redirect::back()->with('error','Tên lớp đã tồn tại');
        }
        else{
            $lopHoc->save();//lưu xong mới có mã phòng
        }
        return Redirect::route('lopHoc.index')->with('success','Thêm tên lớp thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LopHoc  $lopHoc
     * @return \Illuminate\Http\Response
     */
    public function show(LopHoc $lopHoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LopHoc  $lopHoc
     * @return \Illuminate\Http\Response
     */
    public function edit(LopHoc $lopHoc)
    {
        //
      if (Auth::user()->phan_quyen == 1){
        $lstLopHoc=LopHoc::all();
        return view('component/lop-hoc/lophoc-edit',['lopHoc'=>$lopHoc,'lstLopHoc'=>$lstLopHoc]);
        }else{
                            abort('403', __('Bạn không có quyền vào trang này'));
                        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LopHoc  $lopHoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LopHoc $lopHoc)
    {
        //
        $this->validate(
            $request,
            [
                'TenLop' => 'required',
            ],
            [
                'TenLop.required' => 'Chưa nhập tên lớp học',

            ]
        );
        $lopHoc->fill([
            'ten_lop'=>$request->input('TenLop'),
        ]);
        $ktLopHoc=LopHoc::where([['id',$lopHoc->id], ['ten_lop',$request->input('TenLop')]])->first();
        if(!$ktLopHoc){
            $lopHoc->save();
            return Redirect::route('lopHoc.index')->with('success','Sửa lớp học thành công');
        }
        else{
            return Redirect::back()->with('error','Tên lớp học đã tồn tại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LopHoc  $lopHoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(LopHoc $lopHoc)
    {
        //
    }

    public function xoa($id)
    {
        $lopHoc=LopHoc::find($id);
            $lopHoc->trang_thai=0;
            $lopHoc->save();
        return Redirect::route('lopHoc.index');
    }
}

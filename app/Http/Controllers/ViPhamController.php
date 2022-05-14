<?php

namespace App\Http\Controllers;

use App\Models\ViPham;
use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreViPhamRequest;
use App\Http\Requests\UpdateViPhamRequest;
use Illuminate\Support\Facades\Redirect;

class ViPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstViPham=ViPham::all()->where('trang_thai',1)->sortBy('thoi_gian');
        $lstUser=User::all();
        return view('component/vi-pham/vipham-show', ['lstViPham' => $lstViPham,'lstUser',$lstUser]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lstUser=User::all()->where('trang_thai',1);
        return view('component/vi-pham/vipham-create',['lstUser'=>$lstUser]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreViPhamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $viPham= new ViPham();
        $viPham->fill([
            'loi_vi_pham'=>$request->input('LoiViPham'),
            'user_id'=>$request->input('TenNguoiViPham'),
            'thoi_gian'=>$request->input('ThoiGian'),
        ]);
        $ktViPham=ViPham::where([['thoi_gian',$request->input('ThoiGian')],['loi_vi_pham',$request->input('LoiViPham')],['user_id',$request->input('TenNguoiViPham')]])->first();
        // return ($ktDiaDanh);
        if($ktViPham){
            return Redirect::back()->with('error','Vi phạm đã tồn tại');
        }
        else if($request->input('ThoiGian') > Carbon::now()){
            return Redirect::back()->with('error','Nhập thời gian không hợp lệ');
        }
        else{
            $viPham->save();
        }
        return Redirect::route('viPham.index')->with('success','Thêm vi phạm thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ViPham  $viPham
     * @return \Illuminate\Http\Response
     */
    public function show(ViPham $viPham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ViPham  $viPham
     * @return \Illuminate\Http\Response
     */
    public function edit(ViPham $viPham)
    {
        //
        $lstUser=User::all();
        return view('component/vi-pham/vipham-edit',['viPham'=>$viPham,'lstUser'=>$lstUser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateViPhamRequest  $request
     * @param  \App\Models\ViPham  $viPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViPham $viPham)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ViPham  $viPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViPham $viPham)
    {
        //
    }
    public function xoa($id)
    {
        $viPham=ViPham::find($id);
            $viPham->trang_thai=0;
            $viPham->save();
        return Redirect::route('viPham.index');
    }
}

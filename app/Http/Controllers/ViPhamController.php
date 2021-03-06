<?php

namespace App\Http\Controllers;

use App\Models\ViPham;
use Carbon\Carbon;
use App\Models\User;
use App\Models\GiangVien;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::user()->phan_quyen == 1){
            $lstViPham=ViPham::all()->where('trang_thai',1)->sortBy('thoi_gian');
            $lstUser=User::all();
            return view('component/vi-pham/vipham-show', ['lstViPham' => $lstViPham,'lstUser',$lstUser]);
        }else{
            abort('403', __('Bạn không có quyền vào trang này'));
        }
    }

    public function search(Request $request){
        $search = $request->input('search');
        $lstViPham = ViPham::where('loi_vi_pham','LIKE','%'.$search.'%')->orWhere('thoi_gian','LIKE','%'.$search.'%')->get();
        return view('component/vi-pham/vipham-show', ['lstViPham'=>$lstViPham]);
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
        $lstUser=User::all()->where('trang_thai',1);
        $lstUser=User::all()->where('phan_quyen',0);
        $lstGiangVien=GiangVien::all();
        return view('component/vi-pham/vipham-create',['lstUser'=>$lstUser,'lstGiangVien'=>$lstGiangVien]);
        }else{
            abort('403', __('Bạn không có quyền vào trang này'));
        }
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
        $this->validate(
            $request,
            [

                'LoiViPham' => 'required',
                'TenNguoiViPham'=> 'required',
                'ThoiGian'=> 'required',
            ],
            [
                'TenGiangVien.required' => 'Chưa nhập tên giảng viên',
                'LoiViPham.required' => 'Chưa nhập lỗi vi phạm',
                'TenNguoiViPham.required'=> 'Chưa nhập tên người vi phạm',
                'ThoiGian.required'=> 'Chưa chọn thời gian',
            ]
        );
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
        if (Auth::user()->phan_quyen == 1){
            $lstUser=User::all();
            return view('component/vi-pham/vipham-edit',['viPham'=>$viPham,'lstUser'=>$lstUser]);
             }else{
                abort('403', __('Bạn không có quyền vào trang này'));
            }
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
        $this->validate(
            $request,
            [
                'LoiViPham' => 'required',
            ],
            [
                'LoiViPham.required' => 'Chưa nhập lỗi vi phạm',
            ]
        );
        $viPham->fill([
            'loi_vi_pham'=>$request->input('LoiViPham'),
            'user_id'=>$request->input('TenNguoiViPham'),
            'thoi_gian'=>$request->input('ThoiGian'),
        ]);

        if($request->input('ThoiGian') > Carbon::now()){
            return Redirect::back()->with('error','Nhập thời gian không hợp lệ');
        }
        else{
            $viPham->save();
        }
        return Redirect::route('viPham.index')->with('success','Thêm vi phạm thành công');

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

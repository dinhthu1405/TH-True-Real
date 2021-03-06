<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\PhongHoc;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

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

      if (Auth::user()->phan_quyen == 1){
        $getTen=PhongHoc::select('ten_phong')->where('trang_thai',1)->get();
        $ten_phong=substr($getTen, -5, 2);
        $lstPhongHoc=PhongHoc::all()->where('trang_thai',1)->sortBy($ten_phong);
        return view('component/phong-hoc/phonghoc-show',['lstPhongHoc'=>$lstPhongHoc]);
         }else{
                    abort('403', __('Bạn không có quyền vào trang này'));
                }
    }


    public function search(Request $request){
        $search = $request->input('search');
        $lstPhongHoc = PhongHoc::where('ten_phong','LIKE','%'.$search.'%')->get();

        return view('component/phong-hoc/phonghoc-show', ['lstPhongHoc'=>$lstPhongHoc]);
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
            $lstPhongHoc=PhongHoc::all();
            $lstUser=User::all()->where('phan_quyen',0);
            $getTen=PhongHoc::select('ten_phong')->where('trang_thai',1)->get();
            // $ten_phong=substr('$getTen', -2, 1);
            $ten_phong=(substr($getTen, -5, 2));
            // dd($ten_phong >= 99 || $ten_phong == null);
            if( $ten_phong == '[]' || $ten_phong != '[]'){
                return view('component/phong-hoc/phonghoc-create',['lstPhongHoc'=>$lstPhongHoc],['lstUser'=>$lstUser]);
            }else
            if( $ten_phong>=99)
            {
                return Redirect::route('phongHoc.index')->with('error','Thêm quá số phòng qui định');
            }

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
                'TenPhong' => 'required',
            ],
            [
                'TenPhong.required' => 'Chưa nhập tên phòng',
            ]
        );
        $phongHoc= new PhongHoc();
        $ten_phong=ucfirst($request->input('TenPhong'));
        $phongHoc->fill([
            'ten_phong'=>$ten_phong,
        ]);
        // $ten_phong=substr('$getTen', -2, 1);

        $ktTenPhong=PhongHoc::where('ten_phong',$request->input('TenPhong'))->first();
        $ten_phong=(substr($request->input('TenPhong'), -3, 3));//11
        // dd($ten_phong);
        // return ($ktDiaDanh);
        if($ktTenPhong){
            return Redirect::back()->with('error','Tên phòng đã tồn tại');
        }
        else if($ten_phong >= 100)
        {
            return Redirect::back()->with('error','Tên phòng không quá 99 phòng');
        }
        else
        {
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
       if (Auth::user()->phan_quyen == 1){
        $lstPhongHoc=PhongHoc::all();
        $lstUser=User::all()->where('phan_quyen',0);
        return view('component/phong-hoc/phonghoc-edit',['phongHoc'=>$phongHoc,'lstPhongHoc'=>$lstPhongHoc],['lstUser'=>$lstUser]);
         }else{
                        abort('403', __('Bạn không có quyền vào trang này'));
                    }
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
        if($ktPhongHoc){
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

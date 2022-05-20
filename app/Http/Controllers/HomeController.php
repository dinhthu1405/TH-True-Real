<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Loi;
use App\Models\ViPham;
use App\Models\User;
use App\Models\PhanCong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        $loi=Loi::where('trang_thai',1)->count('id');
        $viPham=ViPham::where('trang_thai',1)->count('id');
        $taiKhoan=User::where('trang_thai',0)->count('id');
        $phanCong=PhanCong::where('trang_thai',1)->count('id');

        return view("home",compact('loi','viPham','taiKhoan','phanCong'));
        }else{
                        abort('403', __('Bạn không có quyền vào trang này'));
                    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}

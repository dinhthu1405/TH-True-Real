<?php

namespace App\Http\Controllers;

use App\Models\ThongKe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ThongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstThongKe=ThongKe::all();
        return view('component/thong-ke/thongke-show',['lstThongKe'=>$lstThongKe]);

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
     * @param  \App\Models\ThongKe  $thongKe
     * @return \Illuminate\Http\Response
     */
    public function show(ThongKe $thongKe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThongKe  $thongKe
     * @return \Illuminate\Http\Response
     */
    public function edit(ThongKe $thongKe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ThongKe  $thongKe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThongKe $thongKe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThongKe  $thongKe
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThongKe $thongKe)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ViPham;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreViPhamRequest;
use App\Http\Requests\UpdateViPhamRequest;

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
        $lstViPham=ViPham::all();
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
     * @param  \App\Http\Requests\StoreViPhamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreViPhamRequest $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateViPhamRequest  $request
     * @param  \App\Models\ViPham  $viPham
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateViPhamRequest $request, ViPham $viPham)
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
}

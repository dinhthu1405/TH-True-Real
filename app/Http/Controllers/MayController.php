<?php

namespace App\Http\Controllers;

use App\Models\May;
use App\Models\PhongHoc;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

class MayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstMay = May::all()->where('trang_thai', 1)->sortBy([['phong_id'],['so_may']]);
        return view('component/may/may-show', ['lstMay' => $lstMay]);
    }
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
        // $search=May::search($request->input('search'))->get();
        // Search in the title and body columns from the posts table
        $lstPhong=PhongHoc::where('ten_phong','LIKE','%'.$search.'%')->get();
        // $getPhong=May::whereHas('ten_phong', function($q) use($name) {
        //     $q->where('phong_id', 'like', '%' . $name . '%');
        // })->get();

        $lstMay = May::where('so_may','LIKE','%'.$search.'%')->get();


    // return $lstDiaDanh;
    return view('component/may/may-show', compact('lstMay'));
        // Return the search view with the resluts compacted
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(May $may)
    {
        //
        $lstMay = May::all();
        $lstPhongHoc = PhongHoc::all()->sortBy(['ten_phong','DESC']);
        return view('component/may/may-create', ['lstMay' => $lstMay, 'lstPhongHoc' => $lstPhongHoc]);
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
                'SoMay' => 'required',
                'Phong' => 'required',
            ],
            [
                'SoMay.required' => 'Chưa nhập số máy',
                'Phong.required' => 'Chưa chọn phòng',

            ]
        );
        $may = new May();
        $may->fill([
            'so_may' => $request->input('SoMay'),
            'phong_id' => $request->input('Phong'),
        ]);
        $ktMay = May::where([['so_may', $request->input('SoMay')], ['phong_id', $request->input('Phong')]])->first();
        // dd($ktMay);
        if ($ktMay) {
            return Redirect::back()->with('error', 'Máy đã tồn tại');
        } else {
            $may->save(); //lưu xong mới có mã may
        }
        return Redirect::route('may.index')->with('success', 'Thêm máy thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\May  $may
     * @return \Illuminate\Http\Response
     */
    public function show(May $may)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\May  $may
     * @return \Illuminate\Http\Response
     */
    public function edit(May $may)
    {
        //
        $lstMay = May::all();
        $lstPhongHoc = PhongHoc::all()->sortBy(['ten_phong','DESC']);
        return view('component/may/may-edit', ['lstMay' => $lstMay, 'lstPhongHoc' => $lstPhongHoc, 'may' => $may]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\May  $may
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, May $may)
    {
        //
        $this->validate(
            $request,
            [
                'SoMay' => 'required',
            ],
            [
                'SoMay.required' => 'Chưa nhập số máy',

            ]
        );
        $may->fill([
            'so_may' => $request->input('SoMay'),
            'phong_id' => $request->input('Phong'),
        ]);
        $ktMay = May::where([['so_may', $request->input('SoMay')], ['phong_id', $request->input('Phong')]])->first();
        // dd($ktMay);
        if ($ktMay) {
            return Redirect::back()->with('error', 'Máy đã tồn tại');
        } else {
            $may->save(); //lưu xong mới có mã may
        }
        return Redirect::route('may.index')->with('success', 'Sửa máy thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\May  $may
     * @return \Illuminate\Http\Response
     */
    public function destroy(May $may)
    {
        //
    }
    public function xoa($id)
    {
        $may=May::find($id);
            $may->trang_thai=0;
            $may->save();
        return Redirect::route('may.index');
    }
}

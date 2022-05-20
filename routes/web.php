<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhanCongController;
use App\Http\Controllers\PhongHocController;
use App\Http\Controllers\LopHocController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\LoiController;
use App\Http\Controllers\MayController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViPhamController;
use App\Http\Controllers\ThongKeController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//resource Page

// Route::group(['prefix' => '/'], function(){
//     Route::name('/'),
//     Route::resource('caHoc', CaHocController::class);
//     Route::resource('phongHoc', PhongHocController::class);
//     Route::resource('lopHoc', LopHocController::class);
//     Route::resource('giangVien', GiangVienController::class);
//     Route::resource('may', MayController::class);
//     Route::resource('taiKhoan', UserController::class);
//     Route::resource('loi', LoiController::class);
//     Route::resource('phanCong', PhanCongController::class);
//     Route::resource('viPham', ViPhamController::class);
//     Route::resource('thongKe', ThongKeController::class);
// })->middleware('auth');

    Route::get('/home', [HomeController::class, 'index'])->name('home.index')->middleware('auth');
    Route::resource('caHoc', CaHocController::class)->middleware('auth');
    Route::resource('phongHoc', PhongHocController::class)->middleware('auth');
    Route::resource('lopHoc', LopHocController::class)->middleware('auth');
    Route::resource('giangVien', GiangVienController::class)->middleware('auth');
    Route::resource('may', MayController::class)->middleware('auth');
    Route::resource('taiKhoan', UserController::class)->middleware('auth');
    Route::resource('loi', LoiController::class)->middleware('auth');
    Route::resource('phanCong', PhanCongController::class)->middleware('auth');
    Route::resource('viPham', ViPhamController::class)->middleware('auth');
    Route::resource('thongKe', ThongKeController::class)->middleware('auth');
//xoa
Route::get('/phongHoc/xoa/{id}', [PhongHocController::class, 'xoa'])->name('phongHoc.xoa')->middleware('auth');
Route::get('/lopHoc/xoa/{id}', [LopHocController::class, 'xoa'])->name('lopHoc.xoa')->middleware('auth');
Route::get('/giangVien/xoa/{id}', [GiangVienController::class, 'xoa'])->name('giangVien.xoa')->middleware('auth');
Route::get('/may/xoa/{id}', [MayController::class, 'xoa'])->name('may.xoa')->middleware('auth');
Route::get('/taiKhoan/xoa/{id}', [UserController::class, 'xoa'])->name('taiKhoan.xoa')->middleware('auth');
Route::get('/loi/xoa/{id}', [LoiController::class, 'xoa'])->name('loi.xoa')->middleware('auth');
Route::get('/phanCong/xoa/{id}', [PhanCongController::class, 'xoa'])->name('phanCong.xoa')->middleware('auth');
Route::get('/phanCong/xoa/{id}', [PhanCongController::class, 'xoa'])->name('phanCong.xoa')->middleware('auth');
Route::get('/viPham/xoa/{id}', [ViPhamController::class, 'xoa'])->name('viPham.xoa')->middleware('auth');
//Authorize
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'checkRegister'])->name('checkRegister');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'checkLogin'])->name('checkLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Route
Route::get('/taiKhoan/maneger/{id}', [UserController::class, 'maneger'])->name('taiKhoan.maneger')->middleware('auth');
// Route::get('/loi/xemLoi', [LoiController::class, 'xemLoi'])->name('loi.xemLoi')->middleware('auth');
Route::get('/loi/themLoi', [LoiController::class, 'themLoi'])->name('loi.themLoi')->middleware('auth');
Route::post('/loi/themLoi/{id}', [LoiController::class, 'themLois'])->name('loi.themLois')->middleware('auth');

//Search
Route::post('/giangVien/search/', [GiangVienController::class, 'search'])->name('giangVien.search')->middleware('auth');
Route::post('/may/search/', [MayController::class, 'search'])->name('may.search')->middleware('auth');
Route::post('/lopHoc/search/', [LopHocController::class, 'search'])->name('lopHoc.search')->middleware('auth');
Route::post('/loi/search/', [LoiController::class, 'search'])->name('loi.search')->middleware('auth');
Route::post('/viPham/search/', [ViPhamController::class, 'search'])->name('viPham.search')->middleware('auth');
Route::post('/taiKhoan/search/', [UserController::class, 'search'])->name('taiKhoan.search')->middleware('auth');
Route::post('/phongHoc/search/', [PhongHocController::class, 'search'])->name('phongHoc.search')->middleware('auth');
Route::post('/phanCong/search/', [PhanCongController::class, 'search'])->name('phanCong.search')->middleware('auth');

// //Vi phạm tài khoản
// Route::get('/loi',[LoiController::class,'viPhamTaiKhoan'])->name('viPham');
// Route::post('/loi',[LoiController::class,'viPhamTaiKhoans'])->name('viPhams');

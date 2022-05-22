<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhanCong extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    protected $fillable = [
        'id',
        'ten_ca',
        'phong_hoc_id',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'user_id',
        'trang_thai',
    ];

    public function phongHocs()
    {
      return $this->belongsTo(PhongHoc::class, 'phong_hoc_id');
    }
    public function users()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}



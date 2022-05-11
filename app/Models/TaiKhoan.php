<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaiKhoab extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
    protected $fillable = [
        'id',
        'mssv',
        'mat_khau',
        'ho_ten',
        'hinh_anh',
        'sdt',
        'ngay_sinh',
        'phan_quyen',
        'trang_thai',
    ];
    /**
     * Get the images for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function mays()
    // {
    //     return $this->hasMany(May::class);
    // }
}

<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loi extends Model
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
    'ten_loi',
    'thoi_gian',
    'may_id',
    'user_id',
    'phong_id',
    'giang_vien_id',
    'lop_hoc_id',
    'tinh_trang_loi',
    'trang_thai',
  ];

  public function may()
  {
    return $this->belongsTo(May::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function phongHoc()
  {
    return $this->belongsTo(PhongHoc::class, 'phong_id');
  }

  public function nguoiDungs()
  {
      return $this->hasManyThrough(User::class, PhongHoc::class);
  }

  public function nguoiDung()
  {
      return $this->hasOneThrough(User::class, PhongHoc::class);
  }

  public function giangVien()
  {
    return $this->belongsTo(GiangVien::class);
  }
  public function lopHoc()
  {
    return $this->belongsTo(LopHoc::class);
  }
}

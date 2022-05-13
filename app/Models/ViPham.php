<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ViPham extends Model
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
        'loi_vi_pham',
        'user_id',
        'thoi_gian',
        'trang_thai',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}


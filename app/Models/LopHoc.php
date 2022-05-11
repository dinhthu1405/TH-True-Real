<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LopHoc extends Model
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
     'ten_lop',
     'trang_thai',
 ];

}

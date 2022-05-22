<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Cviebrock\EloquentSluggable\Sluggable;
// use Laravel\Scout\Searchable;

class May extends Model
{
  use HasFactory, SoftDeletes;
//   Searchable;
  protected $guarded = [];
//   public function searhableAs()
//   {
//     return 'may';
//   }
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id',
    'so_may',
    'phong_id',
    'trang_thai',
  ];

  /**
   * Get the images for the user.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function phongHoc()
  {
    return $this->belongsTo(PhongHoc::class, 'phong_id');
  }

  public function lois()
  {
    return $this->hasMany(Loi::class);
  }
}

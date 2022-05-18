<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhongHoc extends Model
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
        'ten_phong',
        'user_id',
        'trang_thai',
    ];
    /**
     * Get the images for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mays()
    {
        return $this->hasMany(May::class);
    }

    public function lois()
    {
        return $this->hasMany(Loi::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function phanCong()
    {
        return $this->belongsTo(PhanCong::class);
    }
}

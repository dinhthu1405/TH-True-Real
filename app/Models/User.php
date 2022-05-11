<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'email',
        'password',
        'ho_ten',
        'hinh_anh',
        'sdt',
        'ngay_sinh',
        'phan_quyen',
        'phong_id',
        'trang_thai',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function mays()
    {
        return $this->hasMany(May::class);
    }

    public function lois()
    {
        return $this->hasMany(Loi::class);
    }

    public function phongHocs()
    {
        //withPivot('column1', 'column2')->Lấy các cột trung gian của 2 cột
        //Với tham số thứ 3 sẽ là khóa ngoại của bảng đang định nghĩa quan hệ và tham số thứ 4 là bảng chúng ta muốn join
        return $this->belongsToMany(PhongHoc::class, 'phong_hoc_users', 'user_id', 'phong_id');
    }

    public function phanCongs()
    {
        return $this->hasMany(PhanCong::class);
    }
}

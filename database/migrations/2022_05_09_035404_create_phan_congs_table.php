<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhanCongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_congs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_ca');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->unsignedBigInteger('phong_id');
            // $table->unsignedBigInteger('lop_id');
            // $table->unsignedBigInteger('giang_vien_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('phong_id')->references('id')->on('phong_hocs');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('trang_thai')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phan_congs');
    }
}

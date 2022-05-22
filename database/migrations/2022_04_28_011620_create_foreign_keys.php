<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mays', function (Blueprint $table) {
            $table->foreign('phong_id')->references('id')->on('phong_hocs');
        });
        Schema::table('lois', function (Blueprint $table) {
            $table->foreign('lop_hoc_id')->references('id')->on('lop_hocs');
            $table->foreign('giang_vien_id')->references('id')->on('giang_viens');
            $table->foreign('phong_id')->references('id')->on('phong_hocs');
            $table->foreign('may_id')->references('id')->on('mays');
            $table->foreign('user_id')->references('id')->on('users');
        });
        // Schema::table('phong_hocs', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users');
        // });
        // Schema::table('phan_congs', function (Blueprint $table) {
        //     $table->foreign('phong_hoc_id')->references('id')->on('phong_hocs');
        //     $table->foreign('lop_hoc_id')->references('id')->on('lop_hocs');
        //     $table->foreign('giang_vien_id')->references('id')->on('giang_viens');
        //     $table->foreign('user_id')->references('id')->on('users');
        // });
        Schema::table('thong_kes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('loi_id')->references('id')->on('lois');
        });
        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreign('phong_id')->references('id')->on('phong_hocs');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mays', function (Blueprint $table) {
            //
        });
    }
}

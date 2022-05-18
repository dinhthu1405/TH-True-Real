<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lois', function (Blueprint $table) {
            $table->id();
            $table->text('ten_loi');
            $table->date('thoi_gian');
            $table->unsignedBigInteger('lop_hoc_id');
            $table->unsignedBigInteger('giang_vien_id');
            $table->unsignedBigInteger('may_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('phong_id');
            $table->string('tinh_trang_loi');
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
        Schema::dropIfExists('lois');
    }
}

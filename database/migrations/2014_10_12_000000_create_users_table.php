<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 250)->unique();
            $table->string('password');
            $table->string('ho_ten');
            $table->string('hinh_anh');
            $table->string('sdt');
            $table->date('ngay_sinh');
            $table->unsignedBigInteger('phong_id');
            $table->boolean('phan_quyen')->nullable()->default(false);
            $table->boolean('trang_thai')->nullable()->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

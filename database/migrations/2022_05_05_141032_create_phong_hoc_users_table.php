<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhongHocUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong_hoc_users', function (Blueprint $table) {
            $table->id();
            // $table->string('ten');
            $table->unsignedBigInteger('phong_id');
            $table->unsignedBigInteger('user_id');
            // $table->integer('user_id')->unsigned();
            // $table->integer('phong_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('phong_id')->references('id')->on('phong_hocs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phong_hoc_users');
    }
}

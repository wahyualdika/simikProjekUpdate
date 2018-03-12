<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DosenPublikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen_publikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('publikasi_id')->unsigned();
            $table->foreign('publikasi_id')->references('id')->on('publikasis')->onDelete('cascade');

            $table->integer('data_dosen_id')->unsigned();
            $table->foreign('data_dosen_id')->references('id')->on('data_dosens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dosen_publikasi');
    }
}

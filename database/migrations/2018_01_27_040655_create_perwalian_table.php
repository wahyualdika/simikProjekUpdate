<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerwalianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perwalian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_mahasiswa_id')->unsigned();
            $table->foreign('data_mahasiswa_id')->references('id')->on('data_mahasiswas')->onDelete('cascade');

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
        Schema::drop('perwalian');
    }
}

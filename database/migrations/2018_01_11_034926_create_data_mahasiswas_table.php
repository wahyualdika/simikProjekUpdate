<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_mahasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim',255);
            $table->string('nama',255);
            $table->string('pembimbing1',255);
            $table->string('pembimbing2',255);
            $table->date('semester');
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
        Schema::dropIfExists('data_mahasiswas');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageColumnToMahasiswas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_mahasiswas', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('tanggal_masuk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_mahasiswas', function (Blueprint $table) {
            $table->dropColumn('gambar');
        });
    }
}

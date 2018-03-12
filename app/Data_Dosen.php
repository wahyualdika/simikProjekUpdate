<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_Dosen extends Model
{
   protected $table = 'data_dosens';

        public function waliMahasiswa()
    {
        return $this->belongsToMany('App\DataMahasiswa','perwalian','data_dosen_id','data_mahasiswa_id');
    }

        public function publikasi()
    {
        return $this->belongsToMany('App\Publikasi','dosen_publikasi','data_dosen_id','publikasi_id');
    }
}

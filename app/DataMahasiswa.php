<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataMahasiswa extends Model
{
    protected $table = 'data_mahasiswas';

    public function dosenWali()
    {
        return $this->belongsToMany('App\Data_Dosen','perwalian','data_mahasiswa_id','data_dosen_id');
    }
}

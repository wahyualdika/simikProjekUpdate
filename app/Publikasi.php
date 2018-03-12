<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    protected $table = 'publikasis';

    public function dsnpublikasi()
    {
        return $this->belongsToMany('App\Data_Dosen','dosen_publikasi','publikasi_id','data_dosen_id');
    }
}

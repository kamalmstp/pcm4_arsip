<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    protected $table = 'rusak';
    protected $primaryKey = 'id_rusak';
    public $timestamps = false;

    public function barang(){
        return $this->hasOne('App\Barang','id_barang','id_barang');
    }

    public function kegiatan(){
        return $this->hasOne('App\Kegiatan','id_kegiatan','id_kegiatan');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    public $timestamps = false;

    public function kegiatan(){
        return $this->hasOne('App\Kegiatan','id_kegiatan','id_kegiatan');
    }
}

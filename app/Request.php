<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'request';
    protected $primaryKey = 'id_request';
    public $timestamps = false;

    public function kegiatan(){
        return $this->hasOne('App\Kegiatan','id_kegiatan','id_kegiatan');
    }

    public function barang(){
        return $this->hasOne('App\Barang','id_barang','id_barang');
    }

    public function user(){
        return $this->hasOne('App\User','id_user','id_user');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    protected $primaryKey = 'id_history';
    public $timestamps = false;

    public function barang(){
        return $this->hasOne('App\Barang','id_barang','id_barang');
    }

    public function request(){
        return $this->hasOne('App\Request','id_request','id_request');
    }
}

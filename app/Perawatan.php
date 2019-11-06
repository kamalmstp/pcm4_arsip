<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perawatan extends Model
{
    protected $table = 'perawatan';
    protected $primaryKey = 'id_perawatan';
    public $timestamps = false;

    public function barang(){
        return $this->hasOne('App\Barang','id_barang','id_barang');
    }
}

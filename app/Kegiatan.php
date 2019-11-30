<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';
    public $timestamps = false;

    public function bidang(){
        return $this->hasOne('App\Bidang','id_bidang','id_bidang');
    }
}

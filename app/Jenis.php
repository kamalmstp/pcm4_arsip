<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis_barang';
    protected $primaryKey = 'id_jenis';
    public $timestamps = false;
}

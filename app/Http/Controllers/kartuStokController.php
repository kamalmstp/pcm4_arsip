<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kartuStokController extends Controller
{
    public function log(){
        return view('/gudang/logstok');
    }
}

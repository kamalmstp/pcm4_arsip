<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App;

use App\History;

class kartuStokController extends Controller
{
    public function log(){
        $history = History::all();
        return view('/gudang/logstok',[
            'history'=>$history,
        ]);
    }
}

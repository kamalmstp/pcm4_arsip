<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class requestController extends Controller
{
    public function request(){
        return view('request');
    }
    public function requestbarang(){
        return view('/kegiatan/request');
    }
}

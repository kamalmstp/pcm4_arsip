<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class diambilController extends Controller
{
    public function diambil(){
        return view('/kegiatan/diambil');
    }
}

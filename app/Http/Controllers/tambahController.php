<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tambahController extends Controller
{
    public function tambah(){
        return view('admin.tambah');
    }
    public function masuk(){
        return view('gudang.masuk');
    }
}

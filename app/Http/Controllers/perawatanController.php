<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class perawatanController extends Controller
{
    public function perawatan(){
        return view('/kegiatan/perawatan');
    }
    public function tambahperawatan(){
        return view('/kegiatan/tambahperawatan');
    }
}

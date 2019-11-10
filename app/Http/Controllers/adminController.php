<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App;

use App\Barang;
use App\Kegiatan;
use App\Gudang;
use App\Jenis;

class adminController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view('index',[
            "barang"=>$barang
        ]);
    }

    public function edit($id){
        
    }
}

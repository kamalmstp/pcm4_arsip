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

class nilaiController extends Controller
{
    public function add(Request $request){
        if($request->session()->get('roles') == 'kegiatan'){
            $barang = Barang::where(['id_user'=>$request->session()->get('admin'),'id_jenis'=>1])->get();
        }else{
            $barang = Barang::where('id_jenis',1)->get();
        }
        return view('index',[
            "barang"=>$barang
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App;

use App\User;
use App\Request as Permintaan;
use App\Kegiatan;
use App\Barang;

class diambilController extends Controller
{
    public function diambil(){
        $request = Permintaan::all();
        return view('/kegiatan/diambil',[
            'request'=>$request,
        ]);
    }

    public function delete($id){
        $permintaan = Permintaan::find($id);
        if(is_null($permintaan)){
            App::abort(404);
        }
        // hapus
        $permintaan->delete();

        return redirect()->route('diambil')->with(['success' => 'Data Berhasil Di Hapus']);
    }
}

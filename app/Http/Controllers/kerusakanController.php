<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App;

use App\Kerusakan;
use App\Kegiatan;
use App\Barang;

class kerusakanController extends Controller
{
    public function kerusakan(){
        $kerusakan = Kerusakan::all();
        return view('/admin/kerusakan',["kerusakan"=>$kerusakan]);
    }

    public function tambahkerusakan(){
        $barang = Barang::all();
        $kegiatan = Kegiatan::all();
        return view('/admin/tambahkerusakan',[
            "barang"=>$barang,
            "kegiatan"=>$kegiatan
        ]);
    }

    public function save(Request $request){
        $method = $request->method();
        if ($request->isMethod('post')) {
            $messages = [
                'required' => ':attribute harus di isi.',
            ];

            $rules = [
                'barang' => 'required',
                'kegiatan' => 'required',
                'keterangan' => 'required',
                'tanggal' => 'required',
            ];

            $validator = Validator::make(request()->all(), $rules, $messages);

            if($validator->fails()){
                $data["status"] = false;
                $data["error"] = $validator->errors();
                return response()->json($data);
            }

            $perawatan = new Kerusakan;
            $perawatan->id_barang = $request->barang;
            $perawatan->id_kegiatan = $request->kegiatan;
            $perawatan->keterangan = $request->keterangan;
            $perawatan->tanggal = $request->tanggal;
            $perawatan->save();

            $data["status"] = true;
            Session::flash('success', 'Data Berhasil Di Tambah');
            return response()->json($data);
        }
    }

    public function delete($id){
        $kerusakan = Kerusakan::find($id);
        if(is_null($kerusakan)){
            App::abort(404);
        }
        // hapus
        $kerusakan->delete();

        return redirect()->route('kerusakan')->with(['success' => 'Data Berhasil Di Hapus']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App;

use App\Perawatan;
use App\Barang;

class perawatanController extends Controller
{
    public function perawatan(){
        $perawatan = Perawatan::all();
        return view('/kegiatan/perawatan',[
            "perawatan"=>$perawatan,
        ]);
    }

    public function tambahperawatan(){
        $barang = Barang::all();
        return view('/kegiatan/tambahperawatan',["barang"=>$barang]);
    }

    public function edit($id){
        $barang = Barang::all();
        $perawatan = Perawatan::find($id);
        if(is_null($perawatan)){
            App::abort(404);
        }
        return view("kegiatan/editperawatan",[
            "perawatan"=>$perawatan,
            "barang"=>$barang
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
                'jadwal' => 'required',
                'keterangan' => 'required',
            ];

            $validator = Validator::make(request()->all(), $rules, $messages);

            if($validator->fails()){
                $data["status"] = false;
                $data["error"] = $validator->errors();
                return response()->json($data);
            }

            $perawatan = new Perawatan;
            $perawatan->jadwal = $request->jadwal;
            $perawatan->id_barang = $request->barang;
            $perawatan->keterangan = $request->keterangan;
            $perawatan->save();

            $data["status"] = true;
            Session::flash('success', 'Data Berhasil Di Tambah');
            return response()->json($data);
        }
    }

    public function saveEdit(Request $request){
        $method = $request->method();
        if ($request->isMethod('post')) {
            $messages = [
                'required' => ':attribute harus di isi.',
            ];

            $rules = [
                'barang' => 'required',
                'jadwal' => 'required',
                'keterangan' => 'required',
            ];

            $validator = Validator::make(request()->all(), $rules, $messages);

            if($validator->fails()){
                $data["status"] = false;
                $data["error"] = $validator->errors();
                return response()->json($data);
            }

            $perawatan = Perawatan::find($request->id_perawatan);
            $perawatan->jadwal = $request->jadwal;
            $perawatan->id_barang = $request->barang;
            $perawatan->keterangan = $request->keterangan;
            $perawatan->save();

            $data["status"] = true;
            Session::flash('success', 'Data Berhasil Di Tambah');
            return response()->json($data);
        }
    }

    public function delete($id){
        $perawatan = Perawatan::find($id);
        if(is_null($perawatan)){
            App::abort(404);
        }
        // hapus
        $perawatan->delete();

        return redirect()->route('perawatan')->with(['success' => 'Data Berhasil Di Hapus']);
    }
}

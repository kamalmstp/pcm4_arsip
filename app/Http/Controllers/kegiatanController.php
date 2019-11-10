<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App;

use App\Kegiatan;
use App\Bidang;

class kegiatanController extends Controller
{
    public function index(){
        $kegiatan = Kegiatan::all();
        return view("kegiatan.list",["kegiatans"=>$kegiatan]);
    }

    public function add(){
        $bidang = Bidang::all();
        return view("kegiatan.add",["bidang"=>$bidang]);
    }

    public function edit($id){
        $kegiatan = Kegiatan::find($id);
        $bidang = Bidang::all();
        if(is_null($kegiatan)){
            App::abort(404);
        }
        return view("kegiatan.edit",[
            "kegiatan"=>$kegiatan,
            "bidang"=>$bidang
            ]);
    }

    public function save(Request $request){
        $method = $request->method();
        if ($request->isMethod('post')) {
            $messages = [
                'required' => ':attribute harus di isi.',
                'max' => ':attribute tidak lebih dari :max'
            ];

            $rules = [
                'nama' => 'required|max:45',
                'bidang' => 'required',
            ];

            $validator = Validator::make(request()->all(), $rules, $messages);

            if($validator->fails()){
                $data["status"] = false;
                $data["error"] = $validator->errors();
                return response()->json($data);
            }

            $kegiatan = new Kegiatan;
            $kegiatan->nama = $request->nama;
            $kegiatan->id_bidang = $request->bidang;
            $kegiatan->save();

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
                'max' => ':attribute tidak lebih dari :max'
            ];

            $rules = [
                'nama' => 'required|max:45',
            ];

            $validator = Validator::make(request()->all(), $rules, $messages);

            if($validator->fails()){
                $data["status"] = false;
                $data["error"] = $validator->errors();
                return response()->json($data);
            }

            $kegiatan = Kegiatan::find($request->id_kegiatan);
            $kegiatan->nama = $request->nama;
            $kegiatan->id_bidang = $request->bidang;
            $kegiatan->save();

            $data["status"] = true;
            Session::flash('success', 'Data Berhasil Di Simpan');
            return response()->json($data);
        }
    }

    public function delete($id){
        $kegiatan = Kegiatan::find($id);
        if(is_null($kegiatan)){
            App::abort(404);
        }
        // hapus
        $kegiatan->delete();

        return redirect()->route('kegiatan.list')->with(['success' => 'Data Berhasil Di Hapus']);
    }
}

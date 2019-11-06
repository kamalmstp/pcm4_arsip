<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App;

use App\Jenis;

class jenisController extends Controller
{
    public function index(){
        $jenis = Jenis::all();
        return view("jenis.list",["jenis"=>$jenis]);
    }

    public function add(){
        return view("jenis.add");
    }

    public function edit($id){
        $jenis = Jenis::find($id);
        if(is_null($jenis)){
            App::abort(404);
        }
        return view("jenis.edit",["jenis"=>$jenis]);
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
            ];

            $validator = Validator::make(request()->all(), $rules, $messages);

            if($validator->fails()){
                $data["status"] = false;
                $data["error"] = $validator->errors();
                return response()->json($data);
            }

            $jenis = new Jenis;
            $jenis->nama = $request->nama;
            $jenis->save();

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

            $jenis = Jenis::find($request->id_jenis);
            $jenis->nama = $request->nama;
            $jenis->save();

            $data["status"] = true;
            Session::flash('success', 'Data Berhasil Di Simpan');
            return response()->json($data);
        }
    }

    public function delete($id){
        $jenis = Jenis::find($id);
        if(is_null($jenis)){
            App::abort(404);
        }
        // hapus
        $jenis->delete();

        return redirect()->route('jenis.list')->with(['success' => 'Data Berhasil Di Hapus']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App;

use App\Bidang;

class bidangController extends Controller
{
    public function index(){
        $bidang = Bidang::all();
        return view("bidang.list",["bidang"=>$bidang]);
    }

    public function add(){
        return view("bidang.add");
    }

    public function edit($id){
        $bidang = Bidang::find($id);
        if(is_null($bidang)){
            App::abort(404);
        }
        return view("bidang.edit",["bidang"=>$bidang]);
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

            $bidang = new Bidang;
            $bidang->nama = $request->nama;
            $bidang->save();

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

            $bidang = Bidang::find($request->id_bidang);
            $bidang->nama = $request->nama;
            $bidang->save();

            $data["status"] = true;
            Session::flash('success', 'Data Berhasil Di Simpan');
            return response()->json($data);
        }
    }

    public function delete($id){
        $bidang = Bidang::find($id);
        if(is_null($bidang)){
            App::abort(404);
        }
        // hapus
        $bidang->delete();

        return redirect()->route('bidang.list')->with(['success' => 'Data Berhasil Di Hapus']);
    }
}

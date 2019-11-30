<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App;

use App\Gudang;

class gudangController extends Controller
{
    public function index(){
        $gudang = Gudang::all();
        return view("gudang.list",["gudang"=>$gudang]);
    }

    public function add(){
        return view("gudang.add");
    }

    public function edit($id){
        $gudang = Gudang::find($id);
        if(is_null($gudang)){
            App::abort(404);
        }
        return view("gudang.edit",["gudang"=>$gudang]);
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

            $gudang = new Gudang;
            $gudang->nama = $request->nama;
            $gudang->save();

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

            $gudang = Gudang::find($request->id_gudang);
            $gudang->nama = $request->nama;
            $gudang->save();

            $data["status"] = true;
            Session::flash('success', 'Data Berhasil Di Simpan');
            return response()->json($data);
        }
    }

    public function delete($id){
        $gudang = Gudang::find($id);
        if(is_null($gudang)){
            App::abort(404);
        }
        // hapus
        $gudang->delete();

        return redirect()->route('gudang.list')->with(['success' => 'Data Berhasil Di Hapus']);
    }
}

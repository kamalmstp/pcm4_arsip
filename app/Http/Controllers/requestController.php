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

class requestController extends Controller
{

    public function request(){
        $request = Permintaan::all();
        return view('request',[
            'request'=>$request,
        ]);
    }

    public function requestbarang(){
        $barang = Barang::all();
        $kegiatan = Kegiatan::all();
        $user = User::all();
        return view('/kegiatan/request',[
            'barang'=>$barang,
            'kegiatan'=>$kegiatan,
            'user'=>$user,
        ]);
    }

    public function lihat($id){
        $request = Permintaan::find($id);
        $barang = Barang::all();
        $kegiatan = Kegiatan::all();
        $user = User::all();
        return view('/kegiatan/lihatrequest',[
            'request'=>$request,
            'barang'=>$barang,
            'kegiatan'=>$kegiatan,
            'user'=>$user,
        ]);
    }

    public function edit($id){
        $request = Permintaan::find($id);
        $barang = Barang::all();
        $kegiatan = Kegiatan::all();
        $user = User::all();
        return view('/kegiatan/editrequest',[
            'request'=>$request,
            'barang'=>$barang,
            'kegiatan'=>$kegiatan,
            'user'=>$user,
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
                'nama_req' => 'required|max:45',
                'id_barang' => 'required',
                'qty' => 'required',
                'id_kegiatan' => 'required',
                'id_user' => 'required',
            ];

            $validator = Validator::make(request()->all(), $rules, $messages);

            if($validator->fails()){
                $data["status"] = false;
                $data["error"] = $validator->errors();
                return response()->json($data);
            }

            $permintaan = new Permintaan;
            $permintaan->nama_req = $request->nama_req;
            $permintaan->id_barang = $request->id_barang;
            $permintaan->qty = $request->qty;
            $permintaan->id_kegiatan = $request->id_kegiatan;
            $permintaan->id_user = $request->id_user;
            $permintaan->tanggal = date("Y-m-d");
            $permintaan->save();

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
                'nama_req' => 'required|max:45',
                'id_barang' => 'required',
                'qty' => 'required',
                'id_kegiatan' => 'required',
                'id_user' => 'required',
            ];

            $validator = Validator::make(request()->all(), $rules, $messages);

            if($validator->fails()){
                $data["status"] = false;
                $data["error"] = $validator->errors();
                return response()->json($data);
            }

            $permintaan = Permintaan::find($request->id_request);
            $permintaan->nama_req = $request->nama_req;
            $permintaan->id_barang = $request->id_barang;
            $permintaan->qty = $request->qty;
            $permintaan->id_kegiatan = $request->id_kegiatan;
            $permintaan->id_user = $request->id_user;
            $permintaan->save();

            $data["status"] = true;
            Session::flash('success', 'Data Berhasil Di Tambah');
            return response()->json($data);
        }
    }

    public function delete($id){
        $permintaan = Permintaan::find($id);
        if(is_null($permintaan)){
            App::abort(404);
        }
        // hapus
        $permintaan->delete();

        return redirect()->route('request')->with(['success' => 'Data Berhasil Di Hapus']);
    }

}

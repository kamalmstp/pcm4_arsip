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
use App\History;

class requestController extends Controller
{

    public function request(Request $request){
        $permintaan = Permintaan::all();
        $roles = $request->session()->get('roles');
        return view('request',[
            'request'=>$permintaan,
            "roles"=>$roles
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

    public function setujui($id){
        $permintaan = Permintaan::find($id);
        $barang = Barang::find($permintaan->id_barang);

        if(is_null($permintaan)){
            App::abort(404);
        }

        // update stock
        $qty = $barang->qty - $permintaan->qty;
        $barang->qty = $qty;
        $barang->save();

        $history = new History;
        $history->id_barang = $barang->id_barang;
        $history->tanggal = date('Y-m-d');
        $history->harga = $barang->harga;
        $history->qty = $qty;
        $history->toko = $barang->toko;
        $history->id_request = $permintaan->id_request;
        $history->status = 0;
        $history->save();

        $permintaan->status = 1;
        $permintaan->save();

        return redirect()->route('request')->with(['success' => 'Data Berhasil Di Setujui']);
    }

}

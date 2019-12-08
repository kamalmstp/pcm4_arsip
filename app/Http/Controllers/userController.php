<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App;

use App\User;

class userController extends Controller
{
    public function index(){
        $user = User::all();
        return view('user.list',[
            'user'=>$user,
        ]);
    }

    public function edit($id){
        $user = User::find($id);
        return view('user.edit',[
            'user'=>$user,
        ]);
    }

    public function add(){
        return view('user.add');
    }

    public function save(Request $request){
        $method = $request->method();
        if ($request->isMethod('post')) {
            $messages = [
                'required' => ':attribute harus di isi.',
                'max' => ':attribute tidak lebih dari :max',
                'confirmed' => 'Password & Konfirmasi Password Tidak Sama.'
            ];

            $rules = [
                'username' => 'required|max:50',
                'nama' => 'required|max:45',
                'jabatan' => 'required|max:45',
                'nip' => 'required|max:25',
                'password' => 'required|confirmed',
                'roles' => 'required',
                'status' => 'required',
            ];

            $validator = Validator::make(request()->all(), $rules, $messages);

            if($validator->fails()){
                $data["status"] = false;
                $data["error"] = $validator->errors();
                return response()->json($data);
            }

            $gudang = new User;
            $gudang->username = $request->username;
            $gudang->nama = $request->nama;
            $gudang->jabatan = $request->jabatan;
            $gudang->nip = $request->nip;
            $gudang->password = password_hash($request->password, PASSWORD_DEFAULT);
            $gudang->roles = $request->roles;
            $gudang->status = $request->status;
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
                'max' => ':attribute tidak lebih dari :max',
                'confirmed' => 'Password & Konfirmasi Password Tidak Sama.'
            ];

            $rules = [
                'username' => 'required|max:50',
                'nama' => 'required|max:45',
                'jabatan' => 'required|max:45',
                'nip' => 'required|max:25',
                'password' => 'confirmed',
                'roles' => 'required',
                'status' => 'required',
            ];

            $validator = Validator::make(request()->all(), $rules, $messages);

            if($validator->fails()){
                $data["status"] = false;
                $data["error"] = $validator->errors();
                return response()->json($data);
            }

            $gudang = User::find($request->id_user);
            $gudang->username = $request->username;
            $gudang->nama = $request->nama;
            $gudang->jabatan = $request->jabatan;
            $gudang->nip = $request->nip;
            if($request->password != ""){
                $gudang->password = password_hash($request->password, PASSWORD_DEFAULT);
            }
            $gudang->roles = $request->roles;
            $gudang->status = $request->status;
            $gudang->save();

            $data["status"] = true;
            Session::flash('success', 'Data Berhasil Di Ubah');
            return response()->json($data);
        }
    }

    public function delete($id){
        $user = User::find($id);
        if(is_null($user)){
            App::abort(404);
        }
        // hapus
        $user->delete();

        return redirect()->route('user')->with(['success' => 'Data Berhasil Di Hapus']);
    }
}

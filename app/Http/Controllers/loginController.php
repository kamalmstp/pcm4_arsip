<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use redirect;
use Session;

use App\User;

class loginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function proccess_login(Request $request){
        $username = $request->username;
        $cek_username = DB::table('user')->where('username', $username)->count();
        if($cek_username > 0){
            $user = DB::table('user')->where('username', $username)->first();
            if(password_verify($request->password, $user->password)){
                $request->session()->put('admin',$user->id_user);
                $request->session()->put('roles',$user->roles);
                return redirect('/index');
            }else{
                Session::flash('error', 'Username Atau Password Salah');
                return redirect('/login');
            }
        }else{
                Session::flash('error', 'Username Atau Password Salah');
                return redirect('/login');
        }
    }

    public function proccess_logout(Request $request){
        $request->session()->forget('admin');
        $request->session()->forget('roles');
        return redirect('/login');
    }
}

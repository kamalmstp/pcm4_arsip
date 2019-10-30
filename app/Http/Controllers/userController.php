<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        return view('user.list');
    }
    public function edit(){
        return view('user.edit');
    }
    public function add(){
        return view('user.add');
    }
}

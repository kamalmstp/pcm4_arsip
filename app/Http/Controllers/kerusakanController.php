<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kerusakanController extends Controller
{
    public function kerusakan(){
        return view('/admin/kerusakan');
    }
    public function tambahkerusakan(){
        return view('/admin/tambahkerusakan');
    }
}

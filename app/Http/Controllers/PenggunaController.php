<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index(){
        $pengguna = User::all();
        return view('pengguna.index', compact('pengguna'));
    }

    public function prosestambah(Request $request){
        $pengguna = User::create([
           'username' =>  $request->username,
           'name' =>  $request->name,
           'password' =>  $request->password,
           'level' =>  $request->level,
        ]);
        return redirect()->back();
    }

    public function proseshapus($id){
        $pengguna = User::findOrFail($id);
        $pengguna->delete();
        return redirect()->back();
    }
}
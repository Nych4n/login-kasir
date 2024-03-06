<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(){
        $pelanggan=Pelanggan::all();
        return view('pelanggan.index',compact('pelanggan'));
    }

    public function tambah(Request $request){
        $pelanggan=Pelanggan::create([
            'nama_pel' => $request->nama_pel,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);

        return redirect()->back();
    }

    public function ubah($pelanggan_id){
        $pelanggan=Pelanggan::findOrFail($pelanggan_id);
        return view('pelanggan.edit',compact('pelanggan'));
    }

    public function ganti(Request $request , $pelanggan_id){
        $pelanggan = Pelanggan::findOrFail($pelanggan_id);
        $pelanggan->update([
            'nama_pel' => $request->nama_pel,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);

        return redirect()->route('index');
    }

    public function delete($pelanggan_id){
        $pelanggan = Pelanggan::findOrFail($pelanggan_id);
        $pelanggan->delete();
        return redirect()->back();
    }
}
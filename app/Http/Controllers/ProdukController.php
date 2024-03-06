<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $produk=Produk::all();
        return view('produk.index',compact('produk'));
    }

    public function create(Request $request){
        $data=Produk::create([
           'kode_produk' => $request->kode_produk, 
           'nama_produk' => $request->nama_produk, 
           'stok' => $request->stok, 
           'harga' => $request->harga, 
        ]);
        return redirect()->back();
    }

    public function edit($produk_id){
        $produk = Produk::findOrFail($produk_id);
        return view('produk.edit',compact('produk'));
    }

    public function update(Request $request, $produk_id){
        $produk = Produk::findOrFail($produk_id);
        $produk->update([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'stok'        => $request->stok,
            'harga'       => $request->harga,
        ]);

        return redirect()->route('index');
    }

    public function hapus($produk_id){
        $produk=Produk::findOrFail($produk_id);
        $produk->delete();
        return redirect()->back();
    }
}
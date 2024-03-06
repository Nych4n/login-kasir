<?php

namespace App\Http\Controllers;

use App\Models\Detail_Penjualan;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index(){
        $penjualan = DB::table('penjualan as a')
        ->select('a.*','b.*')
        ->leftJoin('pelanggan as b','a.pelanggan_id','=','b.pelanggan_id')
        ->get();

        $pelanggan = Pelanggan::orderBy('nama_pel','ASC')->get();

        $data=[
            'penjualan' => $penjualan,
            'pelanggan' => $pelanggan,
        ];

        return view('penjualan.index', compact('penjualan','pelanggan','data'));
    }

    public function transaksi($pelanggan_id){
        $tanggal = Carbon::now()->format('Y-m');
        $jumlah = Penjualan::whereRaw("DATE_FORMAT(tgl_penjualan, '%Y-%m') =? " ,[$tanggal])->count();
        $nota = date('ymd'). ($jumlah + 1);

        $produk = Produk::where('stok','>',0)->get();
        $namapelanggan = Pelanggan::where('pelanggan_id' , $pelanggan_id)->value('nama_pel');
        $detail = DB::table('detail_penjualan as a')
        ->leftJoin('produk as b', 'a.produk_id','=','b.produk_id')
        ->where('a.kode_penjualan', $nota)
        ->get();

        $data=[
            'nota' => $nota,
            'produk' => $produk,
            'namapelanggan' => $namapelanggan,
            'detail' => $detail,
            'pelanggan_id' => $pelanggan_id,
        ];

        return view('penjualan.transaksi', $data)->with(compact('detail'));
    }

    public function tambahkeranjang(Request $request,$pelanggan_id){
        $produk=Produk::where('produk_id', $request->produk_id)->first();
        $harga = $produk->harga;
        $stok_lama = $produk->stok;
        $stok_sekarang = $stok_lama - $request->jumlah;
        $sub_total = $request->jumlah * $harga;

        $data = [
          'kode_penjualan' => $request->input('kode_penjualan'),  
          'produk_id' => $request->input('produk_id'),  
          'jumlah' => $request->input('jumlah'),  
          'subtotal' => $sub_total,  
          'pelanggan_id' => $pelanggan_id,  
        ];
            
        if($stok_lama >= $request->jumlah){
            Detail_Penjualan::create($data);
            $data2 = [
                'stok' => $stok_sekarang,
            ];

            $where= ['produk_id' => $request->produk_id];
            Produk::where($where)->update($data2);
            $penjualan = Penjualan::where('pelanggan_id', $pelanggan_id)->get();
            
            return redirect()->back()->with(compact('penjualan'));
        }else{
            return redirect()->back();
        }
    }

    public function prosesdelete($DetailID, $ProdukID){
        $detailpenjualan=Detail_Penjualan::find($DetailID);
        $jumlah = $detailpenjualan->jumlah;
       
        $produk = Produk::find($ProdukID);
        $stok_lama = $produk->stok;
        $stok_sekarang = $stok_lama + $jumlah;
        $produk->update(['stok'=>$stok_sekarang]);

        $detailpenjualan->delete();
        return redirect()->back();
               
    }

    public function bayar(Request $request , $nota){
        $data =[
            'kode_penjualan' => $request->kode_penjualan,
            'pelanggan_id' => $request->pelanggan_id,
            'total_harga' => $request->total_harga,
            'pembayaran' => $request->pembayaran,
            'tgl_penjualan' => Carbon::now()->format('Y-m-d'),
        ];

       Penjualan::create($data);

        return redirect()->route('invoice',['kode_penjualan' => $request->kode_penjualan]);
    }

    public function invoice($kode_penjualan){
        $tanggal = Carbon::now()->format('Y-m');
        $penjualan = DB::table('penjualan as a')
        ->select('a.*','b.*')
        ->leftJoin('pelanggan as b','a.pelanggan_id','=','b.pelanggan_id')
        ->where('a.kode_penjualan', $kode_penjualan)
        ->orderBy('a.tgl_penjualan', 'ASC')
        ->get();
        
        $detail = DB::table('detail_penjualan as a')
        ->leftJoin('produk as b', 'a.produk_id','=','b.produk_id')
        ->where('a.kode_penjualan', $kode_penjualan)
        ->get();

        $data=[
            'tanggal' => $tanggal,
            'penjualan' => $penjualan,
            'nota' => $kode_penjualan,
            'detail' => $detail,
        ];
        
        return view('penjualan.invoice', $data);
    }
}
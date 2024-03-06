<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware'=> 'auth'],function(){
    
    Route::get('/', function () {
        return view('home');
    });

    Route::get('produk',[ProdukController::class,'index'])->name('index');
    Route::post('create',[ProdukController::class,'create'])->name('create');
    Route::get('edit/{produk_id}',[ProdukController::class,'edit'])->name('edit');
    Route::put('update/{produk_id}',[ProdukController::class,'update'])->name('update');
    Route::delete('hapus/{produk_id}',[ProdukController::class,'hapus'])->name('hapus');

    // pelanggan
    Route::get('pelanggan',[PelangganController::class, 'index'])->name('index');
    Route::post('tambah',[PelangganController::class, 'tambah'])->name('tambah');
    Route::get('ubah/{pelanggan_id}',[PelangganController::class, 'ubah'])->name('ubah');
    Route::put('ganti/{pelanggan_id}',[PelangganController::class, 'ganti'])->name('ganti');
    Route::delete('delete/{pelanggan_id}',[PelangganController::class,'delete'])->name('delete');

    // Penjualan
    Route::get('penjualan',[PenjualanController::class,'index'])->name('index');
    Route::get('transaksi/{pelanggan_id}',[PenjualanController::class,'transaksi'])->name('transaksi');
    Route::post('tambahkeranjang/{pelanggan_id}',[PenjualanController::class,'tambahkeranjang'])->name('tambahkeranjang');
    Route::delete('prosesdelete/{DetailID}/{ProdukID}',[PenjualanController::class,'prosesdelete'])->name('prosesdelete');
    Route::post('bayar/{nota}',[PenjualanController::class,'bayar'])->name('bayar');
    Route::get('invoice/{kode_penjualan}',[PenjualanController::class,'invoice'])->name('invoice');

    Route::middleware('admin')->group(function(){
        
        //pengguna
        Route::get('pengguna',[PenggunaController::class,'index'])->name('index');
        Route::post('prosestambah',[PenggunaController::class,'prosestambah'])->name('prosestambah');
        Route::delete('proseshapus/{id}',[PenggunaController::class,'proseshapus'])->name('proseshapus');
    });
});


Route::get('login',[AuthController::class,'showlogin'])->name('showlogin');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $primaryKey='penjualan_id';
    protected $table='penjualan';
    protected $fillable=[
      'kode_penjualan',  
      'tgl_penjualan',  
      'total_harga',  
      'pembayaran',  
      'pelanggan_id',  
    ];
}
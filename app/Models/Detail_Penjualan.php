<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Penjualan extends Model
{
    use HasFactory;
    protected $primaryKey='detail_id';
    protected $table = 'detail_penjualan';

    protected $fillable = [
        'kode_penjualan',
        'produk_id',
        'jumlah',
        'subtotal'
    ];
}
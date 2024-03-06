<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('produk_id');
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->decimal('harga', 10);
            $table->integer('stok');
            $table->timestamps();
        });

        DB::table('produk')->insert([
            'kode_produk' => 'A09738',
            'nama_produk' => 'Telur',
            'harga' => '12000',
            'stok' => '15',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
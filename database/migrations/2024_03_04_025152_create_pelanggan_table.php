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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('pelanggan_id');
            $table->string('nama_pel');
            $table->string('alamat');
            $table->string('telp');
            $table->timestamps();
        });

        DB::table('pelanggan')->insert([
            'nama_pel' => 'nana',
            'alamat' => 'teluk',
            'telp' => '089726372',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
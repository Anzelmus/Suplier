<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pinjam_barang', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pinjam');
            $table->string('peminjam');
            $table->string('tgl_pinjam');
            $table->string('id_barang');
            $table->integer('nama_barang');
            $table->string('jml_barang');
            $table->string('tgl_kembali');
            $table->string('kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam_barang');
    }
};

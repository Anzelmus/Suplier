<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    protected $table = 'stok';
    protected $fillable = ['id_barang', 'nama_barang', 'jml_masuk', 'jml_keluar', 'total_barang'];
}
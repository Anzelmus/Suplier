<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{ 
    protected $table = 'supplier';
    protected $fillable = ['id_suplier', 'nama_suplier', 'alamat_suplier', 'telepon_suplier'];
}

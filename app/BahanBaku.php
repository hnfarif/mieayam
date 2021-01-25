<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $table = 'bahanbaku';
    protected $fillable = ['nama_bahan_baku', 'stok', 'satuan'];
}

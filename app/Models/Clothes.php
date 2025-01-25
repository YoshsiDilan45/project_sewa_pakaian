<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
    use HasFactory;
    protected $table = 'pakaians';
    protected $fillable = [
        'nama_pakaian',
        'jenis',
        'model',
        'warna',
        'ukuran', 
        'bahan',
        'deskripsi',
        'foto1',
        'foto2',
        'foto3',
        'stok',
        'harga_sewa'
    ];
}

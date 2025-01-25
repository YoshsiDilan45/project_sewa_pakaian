<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjangs extends Model
{
    use HasFactory;
    protected $table = 'keranjangs';
    protected $fillable = [
        'id_pelanggan',
        'id_pakaian',
        'jumlah_order',
        'subtotal'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_pesanan',
        'total_harga',
        'produk_id',
        'pesanan_id',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'produk_id', 'id');
    }
}

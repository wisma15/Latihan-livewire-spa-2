<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'kategori_id',
        'file_name',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_produk');
    }

    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class, 'produk_id', 'id');
    } 
}

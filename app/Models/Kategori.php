<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "kategoris";
    protected $primaryKey = "id_produk";
    protected $fillable = [
        'id_produk',
        'nama_produk',
    ];

    public function posts() 
    {
        return $this->hasMany(Post::class, 'kategori_id' , 'id_produk');
    } 
}

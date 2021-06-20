<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_pemesanan',
        'status',
        'total_harga',
        'kode_unik',
        'user_id'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status', 'id_status');
    }

    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class);
    } 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

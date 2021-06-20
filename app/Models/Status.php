<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = "statuses";
    protected $primaryKey = "id_status";
    protected $fillable = [
        'id_status',
        'nama_status',
    ];

    public function pesanans() 
    {
        return $this->hasMany(Pesanan::class, 'status' , 'id_status');
    } 
}

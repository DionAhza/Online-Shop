<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'barang_id', 'jumlah', 'pembayaran'];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    // public function cart()
    // {
    //     return $this->belongsTo(Cart::class);
    // }
}



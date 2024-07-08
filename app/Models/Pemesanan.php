<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';

    protected $fillable = [
        'nama',
        'id_user',
        'id_laundry',
        'alamat',
        'no_hp',
        'jenis',
        'berat',
        'total',
        'status',
    ];
}

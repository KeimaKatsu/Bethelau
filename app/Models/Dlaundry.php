<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dlaundry extends Model
{
    use HasFactory;

    protected $table = 'dlaundry';

    protected $fillable = [
        'id_user',
        'gambar',
        'kode_laundry',
        'nama_laundry',
        'deskripsi',
        'alamat',
        'no_hp'
    ];
}

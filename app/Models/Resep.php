<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_resep',
        'id_reservasi',
        'id_dokter',
        'nama_resep',
        'tanggal',
        'pesan',
    ];
}

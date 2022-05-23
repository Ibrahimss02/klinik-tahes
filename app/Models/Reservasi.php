<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_reservasi',
        'id_pasien',
        'id_dokter',
        'nama_awal',
        'nama_tengah',
        'nama_akhir',
        'tanggal',
        'pesan',
        'selesai',
    ];
}

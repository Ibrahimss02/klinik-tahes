<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function index()
    {
        
    }

    public function reservasiDokter($dokter_id)
    {
        $dokter = Dokter::findOrFail($dokter_id);

        return view('pasien.reservasi.form-reservasi', compact('dokter'));
    }

    public function createReservasi($dokter_id, Request $request)
    {
        $reservasi = new Reservasi;

        $reservasi -> id_pasien = Auth::user()->id;
        $reservasi -> id_dokter = $dokter_id;
        $reservasi -> tanggal = $request -> date;
        $reservasi -> pesan = $request -> pesan;
        $reservasi -> save();

        return view('pasien.reservasi.daftar-reservasi');
    }
}

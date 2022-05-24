<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{

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
        $reservasi -> nama_awal = $request -> first_name;
        $reservasi -> nama_tengah = $request -> middle_name;
        $reservasi -> nama_akhir = $request -> last_name;
        $reservasi -> tanggal = $request -> date;
        $reservasi -> pesan = $request -> pesan;
        $reservasi -> save();

        return view('pasien.reservasi.daftar-reservasi');
    }

    public function listReservasi()
    {
        $list_reservasi = Reservasi::where('id_pasien', Auth::user()->id) -> get();
        $dokters = [];
        foreach ($list_reservasi as $reservasi) {
            $dokter_temp = Dokter::find($reservasi -> id_dokter);
            $reservasi -> dokter_name = $dokter_temp->name;
        }
        
        return view('pasien.reservasi.reservasi-list', compact('list_reservasi'));
    }

    public function detailReservasi($id_reservasi)
    {
        $reservasi = Reservasi::findOrFail($id_reservasi);
        $reservasi -> dokter_name = Dokter::findOrFail($reservasi -> id_dokter) -> name;

        return view('pasien.reservasi.detail', compact('reservasi'));
    }

    public function detailReservasiDokter($id_reservasi)
    {
        $reservasi = Reservasi::findOrFail($id_reservasi);

        return view('dokter.reservasi.detail', compact('reservasi'));
    }

    public function updateReservasi($id_reservasi, Request $request)
    {
        $reservasi = Reservasi::findOrFail($id_reservasi);
        $reservasi -> nama_awal = $request -> first_name;
        $reservasi -> nama_tengah = $request -> middle_name;
        $reservasi -> nama_akhir = $request -> last_name;
        $reservasi -> tanggal = $request -> date;
        $reservasi -> pesan = $request -> pesan;
        $reservasi -> save();

        return redirect()->route('reservasi.list');
    }

    public function deleteReservasi($id_reservasi)
    {
        $id_reservasi = Reservasi::findOrFail($id_reservasi);
        $id_reservasi -> delete();

        return redirect()->route('reservasi.list');
    }

    public function indexDokter()
    {
        $list_reservasi = Reservasi::where('id_dokter', Auth::guard('dokter')->user()->id) -> where('selesai', false) -> get();
        
        return view('dokter.reservasi.index', compact('list_reservasi'));
    }

    public function selesaiReservasi($reservasi_id)
    {
        $reservasi = Reservasi::findOrFail($reservasi_id);

        $reservasi -> selesai = true;
        $reservasi -> save();

        return redirect()->route('reservasi.dokter.index');
    }
}

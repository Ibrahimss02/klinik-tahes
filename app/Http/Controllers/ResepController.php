<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Http\Requests\StoreResepRequest;
use App\Http\Requests\UpdateResepRequest;
use App\Models\Dokter;
use App\Models\Reservasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_resep = Resep::where('id_dokter', Auth::guard('dokter')->user()->id)->get();

        return view('dokter.resep.index', compact('list_resep'));
    }

    public function indexPasien()
    {
        $list_reservasi_pasien = Reservasi::where('id_pasien', Auth::user()->id) -> get();
        $list_resep = [];
        foreach($list_reservasi_pasien as $reservasi) {
            $resep = Resep::where('id_reservasi', $reservasi -> id) -> first();
            if (is_null($resep)) {
                continue;
            }
            array_push($list_resep, $resep);
        }

        return view('pasien.resep.index', compact('list_resep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($reservasi_id)
    {
        $reservasi = Reservasi::findOrFail($reservasi_id);

        return view('dokter.resep.form-resep', compact('reservasi'));
    }

    public function showCompletedReservasi()
    {
        $list_reservasi = Reservasi::where([['id_dokter', '=', Auth::guard('dokter')->user()->id], ['selesai', '=', true]]) -> get();

        return view('dokter.resep.index-selesai', compact('list_reservasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResepRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResepRequest $request, $reservasi_id)
    {
        $resep = new Resep;

        $resep -> id_reservasi = $reservasi_id;
        $resep -> id_dokter = Auth::guard('dokter')->user()->id;
        $resep -> nama_resep = $request -> nama_resep;
        $resep -> pesan = $request -> pesan;
        $resep -> tanggal = Carbon::now()->format('m/d/Y');
        $resep -> save();

        return redirect() -> route('resep.dokter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function show($resep_id)
    {
        $resep = Resep::findOrFail($resep_id);

        return view('dokter.resep.detail', compact('resep'));
    }
    
    public function showPasienResep($resep_id)
    {
        $resep = Resep::findOrFail($resep_id);
        $resep -> nama_dokter = Dokter::findOrFail($resep -> id_dokter) -> name;

        return view("pasien.resep.detail", compact('resep'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function edit(Resep $resep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResepRequest  $request
     * @param  String $resep_id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResepRequest $request, $resep_id)
    {   
        $resep = Resep::findOrFail($resep_id);
        $resep -> nama_resep = $request -> name;
        $resep -> tanggal = $request -> date;
        $resep -> pesan = $request -> pesan;
        $resep -> save();

        return redirect()->route('resep.dokter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resep $resep)
    {
        //
    }
}

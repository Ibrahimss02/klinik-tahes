<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pasien.dashboard')->with('user_type', 'pasien');
})->middleware(['web'])->name('dashboard');

Route::middleware('dokter')->prefix('dokter')->group(function () {
    Route::get('dashboard', function () {
        return view('dokter.dashboard')->with('user_type', 'dokter');
    })->name('dokter.dashboard');

    Route::get('reservasi', [ReservasiController::class, 'indexDokter'])
        ->name('reservasi.dokter.index');

    Route::get('reservasi/{reservasi_id}', [ReservasiController::class, 'detailReservasiDokter'])
        ->name('reservasi.detail.dokter');

    Route::post('reservasi/{reservasi_id}/complete', [ReservasiController::class, 'selesaiReservasi'])
        ->name('reservasi.dokter.complete');

    Route::get('resep', [ResepController::class, 'index'])
        ->name('resep.dokter.index');

    Route::get('resep/create', [ResepController::class, 'showCompletedReservasi'])
        ->name('resep.dokter.index.finished');

    Route::get('resep/create/{reservasi_id}', [ResepController::class, 'create'])
        ->name('resep.dokter.create');

    Route::post('resep/create/{reservasi_id}/save', [ResepController::class, 'store'])
        ->name('resep.dokter.create.save');

    Route::get('resep/{resep_id}', [ResepController::class, 'show'])
        ->name('resep.detail.dokter');

    Route::post('resep/{resep_id}/update', [ResepController::class, 'update'])
        ->name('resep.dokter.update');

    Route::post('dokter/logout', [DokterController::class, 'destroy'])
        ->name('dokter.logout');
});



require __DIR__ . '/auth.php';

<?php

namespace Database\Factories;

use App\Models\Dokter;
use App\Models\Reservasi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resep>
 */
class ResepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $reservasi = Reservasi::where('selesai', true) -> get() -> random();

        return [
            'id_reservasi' => $reservasi -> id,
            'id_dokter' => Dokter::all()->random()->id,
            'nama_resep' => "Resep untuk " . $reservasi -> nama_awal,
            'tanggal' => $this->faker->date('m/d/Y'),
            'pesan' => $this->faker->realText(150),
        ];
    }
}

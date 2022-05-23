<?php

namespace Database\Factories;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservasi>
 */
class ReservasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_pasien' => User::all()->random()->id,
            'id_dokter' => Dokter::all()->random()->id,
            'nama_awal' => $this->faker->firstName,
            'nama_tengah' => $this->faker->firstName,
            'nama_akhir' => $this->faker->lastName,
            'tanggal' => $this->faker->date('m/d/Y'),
            'pesan' => $this->faker->realText(150),
            'selesai' => (bool) random_int(0, 1),
        ];
    }
}

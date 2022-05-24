<?php

namespace Database\Seeders;

use App\Models\Resep;
use App\Models\Reservasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this -> call(DokterSeeder::class);
        \App\Models\User::factory(10)->create();
        Reservasi::factory(15)->create();
        $this -> call(ResepSeeder::class);
    }
}

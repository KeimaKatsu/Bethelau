<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pemesanan;
use App\Models\User;
use Database\Factories\PemesananFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Panggil factory PemesananFactory untuk membuat data dummy Pemesanan
        Pemesanan::factory()->count(10)->create();
        User::factory()->count(10)->create();
    }
}

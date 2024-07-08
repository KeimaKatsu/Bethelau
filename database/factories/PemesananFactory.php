<?php

namespace Database\Factories;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PemesananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pemesanan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
{
    return [
        'nama' => $this->faker->name,
        'alamat' => $this->faker->address,
        'no_hp' => $this->faker->phoneNumber,
        'jenis' => $this->faker->word,
        'status' => $this->faker->randomElement(['Belum Diproses', 'Selesai']),
        'created_at' => now(),
        'updated_at' => now(),
    ];
}
}
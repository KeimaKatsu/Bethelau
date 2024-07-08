<?php

// File: UserFactory.php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'level' => $this->faker->randomElement(['Admin', 'Cabang']), // Sesuaikan dengan pilihan level yang tersedia
            'password' => bcrypt('password'), // Default password, bisa disesuaikan jika diperlukan
            'remember_token' => Str::random(10),
        ];
    }
}

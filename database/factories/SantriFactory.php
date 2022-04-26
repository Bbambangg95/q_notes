<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Santri>
 */
class SantriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(), 
            'asal' => $this->faker->unique()->city(),
            'user_id'=> mt_rand(1,5),
            'id_santri'=> $this->faker->unique()->randomNumber($nbDigits = NULL, $strict = false),
            'kelas' => $this->faker->numberBetween($min = 1, $max = 12),
        ];
    }
}

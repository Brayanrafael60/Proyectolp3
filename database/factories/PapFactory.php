<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pap>
 */
class PapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('es_PE');
        return [
            'pap' => $faker->words(3, true),
            'tipo' => 'Pregrado',
            'ciclos' => $faker->numberBetween(10,14),
            'aniversario' => '1990-05-25',
            'facultadid' => $faker->numberBetween(1,5)
        ];
    }
}

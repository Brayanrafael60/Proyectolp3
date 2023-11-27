<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docente>
 */
class DocenteFactory extends Factory
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
            'profesion' => $faker->words(3, true),
            'sueldoxh' => $faker->numberBetween(150,300),
            'userid' => $faker->unique()->numberBetween(5,10)
        ];
    }
}

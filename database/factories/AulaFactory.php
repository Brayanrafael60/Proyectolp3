<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aula>
 */
class AulaFactory extends Factory
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
            'ubicacion' => $faker->unique()->numerify("P").$faker->numberBetween(1,10).'-'.$faker->numberBetween(200,300),
            'descripcion' => $faker->words(3, true),
            'aforo' => $faker->numberBetween(50,70),
        ];
    }
}

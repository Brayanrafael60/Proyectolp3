<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seccion>
 */
class SeccionFactory extends Factory
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
            'seccion' => $faker->unique()->numerify("A#"),
            'capacidad' => $faker->numberBetween(50,60),
            'asignaturaid' => $faker->numberBetween(1,5),
            'docenteid' => $faker->numberBetween(1,10)
        ];
    }
}

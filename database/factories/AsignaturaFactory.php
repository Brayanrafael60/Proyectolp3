<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asignatura>
 */
class AsignaturaFactory extends Factory
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
            'codigo' => $faker->unique()->numerify("######"),
            'ciclo' => $faker->numberBetween(1,10),
            'nombre' => $faker->sentence(3),
            'prerequisito' => $faker->numerify("######"),
            'creditos' => $faker->numberBetween(3,4),
            'tipo' => 'Carrera',
            'ht' => $faker->numberBetween(1,3),
            'hp' => $faker->numberBetween(1,4),
            'papid' => $faker->numberBetween(1,30),
            'planid' => $faker->numberBetween(2,2)
        ];
    }
}

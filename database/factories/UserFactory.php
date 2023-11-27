<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /* return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        */
        $faker = \Faker\Factory::create('es_PE');
        return [
            'codigo' => $faker->unique()->numerify("2022######"),
            'password' => Hash::make('12345678'),
            'DNI' => $faker->unique()->dni(),
            'nombres' => $faker->firstName('male'|'female'),
            'apellidos' => $faker->lastName().' '.$faker->lastName(),
            'celular' => $faker->numerify("+519########"),
            'sexo' => 'Masculino',
            'f_nacimiento' => $faker->date('Y-m-d'),
            'rolid' => $faker->numberBetween(2,2)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

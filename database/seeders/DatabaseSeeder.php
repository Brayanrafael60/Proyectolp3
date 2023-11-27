<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RolSeeder::class,
            FacultadSeeder::class,
            PlanEstudioSeeder::class,
            PapSeeder::class,
            UserSeeder::class,
            PersonalSeeder::class,
            DocenteSeeder::class,
            EstudianteSeeder::class,
            AulaSeeder::class,
            AsignaturaSeeder::class,
            SeccionSeeder::class
        ]);
    }
}

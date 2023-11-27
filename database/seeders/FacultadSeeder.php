<?php

namespace Database\Seeders;

use App\Models\Facultad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facultad::create([
            'facultad' => "Facultad de Ciencias de la Educación y Humanidades"
        ]);

        Facultad::create([
            'facultad' => "Facultad de Ciencias de la Salud"
        ]);

        Facultad::create([
            'facultad' => "Facultad de Ciencias Empresariales"
        ]);

        Facultad::create([
            'facultad' => "Facultad de Derecho y Ciencias Políticas"
        ]);

        Facultad::create([
            'facultad' => "Facultad de Ingeniería"
        ]);
    }
}

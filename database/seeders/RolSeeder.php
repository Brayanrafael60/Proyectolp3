<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'rol' => "Administrador",
            'descripcion' => 'Administrador general'
        ]);

        Rol::create([
            'rol' => "Docente",
            'descripcion' => 'Dictar clases'
        ]);

        Rol::create([
            'rol' => "Estudiante",
            'descripcion' => 'Alumnos'
        ]);

        Rol::create([
            'rol' => "Limpiesa",
            'descripcion' => 'Limpieza general'
        ]);
    }
} 

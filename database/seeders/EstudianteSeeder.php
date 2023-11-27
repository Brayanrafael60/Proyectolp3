<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estudiante::create([
            'col_egreso' => 'Rosulo soto carrillo',
            'userid' => 3,
            'planid' => 2,
            'papid' => 1
        ]);

        Estudiante::create([
            'col_egreso' => 'Cesar ballejo',
            'userid' => 4,
            'planid' => 2,
            'papid' => 1
        ]);
    }
}

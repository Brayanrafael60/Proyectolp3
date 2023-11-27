<?php

namespace Database\Seeders;

use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Personal::create([
            'sueldoxh' => 80.20,
            'area' => 'Encargado del sistema',
            'userid' => 1
        ]);

        Personal::create([
            'sueldoxh' => 50.20,
            'area' => 'Encargado de limpieza P1',
            'userid' => 2
        ]);
    }
}

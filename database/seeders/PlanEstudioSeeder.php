<?php

namespace Database\Seeders;

use App\Models\PlanEstudio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanEstudio::create([
            'año' => "2015",
            'f_inicio' => '2015-01-01',
            'f_fin' => '2020-12-30'
        ]);

        PlanEstudio::create([
            'año' => "2021",
            'f_inicio' => '2021-01-01',
            'f_fin' => '2025-12-30'
        ]);
    }
}

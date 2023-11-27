<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        User::create([
            'codigo' => '20202020',
            'password' => Hash::make('12345678'),
            'DNI' => '745896325',
            'nombres' => 'Super',
            'apellidos' => 'Administrador',
            'celular' => '+51965874582',
            'sexo' => 'Masculino',
            'f_nacimiento' => '1995-05-16',
            'rolid' => 1
        ]);

        User::create([
            'codigo' => '40404040',
            'password' => Hash::make('12345678'),
            'DNI' => '9652365478',
            'nombres' => 'Leon',
            'apellidos' => 'Cajas Prado',
            'celular' => '+51986598752',
            'sexo' => 'Masculino',
            'f_nacimiento' => '1999-05-16',
            'rolid' => 4
        ]);

        User::create([
            'codigo' => '202274937272',
            'password' => Hash::make('74937272'),
            'DNI' => '74937272',
            'nombres' => 'Abimael Epifanio',
            'apellidos' => 'Fernandez Ventura',
            'celular' => '+51986598752',
            'sexo' => 'Masculino',
            'f_nacimiento' => '1999-05-16',
            'rolid' => 3
        ]);

        User::create([
            'codigo' => '202274937271',
            'password' => Hash::make('74937271'),
            'DNI' => '74937271',
            'nombres' => 'Epifanio',
            'apellidos' => 'Fernandez Ventura',
            'celular' => '+52965874563',
            'sexo' => 'Masculino',
            'f_nacimiento' => '1999-05-16',
            'rolid' => 3
        ]);

        User::factory(10)->create();
    }
}

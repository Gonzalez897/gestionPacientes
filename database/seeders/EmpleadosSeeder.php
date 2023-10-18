<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleado = [
            [
                'nombre' => 'Daniela',
                'apellido' => 'Mejicanos',
                'dui' => '123456789',
                'cargo' => 'doctor',
                'f_nacimiento' => '2003-02-15',
                'created_at' => Carbon::now()
            ],

            [
                'nombre' => 'Daniel',
                'apellido' => 'Guevara',
                'dui' => '123456788',
                'cargo' => 'doctor',
                'f_nacimiento' => '2000-02-15',
                'created_at' => Carbon::now()
            ],

            [
                'nombre' => 'Jonathan',
                'apellido' => 'Mejicanos',
                'dui' => '123456666',
                'cargo' => 'doctor',
                'f_nacimiento' => '2002-12-18',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('empleados')->insert($empleado);
    }
}

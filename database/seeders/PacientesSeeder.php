<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paciente = [
            [
                'nombre_paciente' => 'Juana',
                'apellido_paciene' => 'Lopez',
                'dui_paciente' => '123454678',
                'edad_paciente' => '10',
                'created_at' => Carbon::now()
            ],

            [
                'nombre_paciente' => 'Juan',
                'apellido_paciene' => 'Rivas',
                'dui_paciente' => '123457799',
                'edad_paciente' => '12',
                'created_at' => Carbon::now()
            ],

            [
                'nombre_paciente' => 'Ruth',
                'apellido_paciene' => 'Sanchez',
                'dui_paciente' => '123458866',
                'edad_paciente' => '15',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('pacientes')->insert($paciente);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctores = [
            [
                'idEmpleados' => '5',
                'especializacion' => 'General',
                'disponibilidad' => 'Disponible',
                'created_at' => Carbon::now()
            ],

            [
                'idEmpleados' => '6',
                'especializacion' => 'Nutricionista',
                'disponibilidad' => 'No disponible',
                'created_at' => Carbon::now()
            ],

            [
                'idEmpleados' => '7',
                'especializacion' => 'Oftalmologo',
                'disponibilidad' => 'Disponible',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('doctores')->insert($doctores);
    }
}

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
                'created_at' => Carbon::now()
            ],

            [
                'idEmpleados' => '6',
                'especializacion' => 'Nutricionista',
                'created_at' => Carbon::now()
            ],

            [
                'idEmpleados' => '7',
                'especializacion' => 'Oftalmologo',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('doctores')->insert($doctores);
    }
}

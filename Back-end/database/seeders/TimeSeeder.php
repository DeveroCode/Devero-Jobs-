<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'name' => "Urgencia",
            ),
            array(
                'name' => "72 hrs",

            ),
            array(
                'name' => "1 mes",

            ),
            array(
                'name' => "2 meses",

            ),
            array(
                'name' => "6 meses",

            ),
            array(
                'name' => "más de 1 año",
            ),
        ];

        DB::table('times')->insert($data);
    }
}

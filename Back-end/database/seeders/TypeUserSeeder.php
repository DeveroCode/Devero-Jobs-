<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'name' => "reclutador",
            ),
            array(
                'name' => "postulante",
            ),
        ];

        DB::table('type_users')->insert($data);
    }
}

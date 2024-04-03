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
                'name' => "developer",
            ),
            array(
                'name' => "ideamaker",
            ),
        ];

        DB::table('type_users')->insert($data);
    }
}

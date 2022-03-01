<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MicroServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_micro_services')->insert(
            [
                'fl_service' => 'u1',
                'fl_name' => 'Programme Management'
            ]
        );
        DB::table('tbl_micro_services')->insert(
            [
                'fl_service' => 'u2',
                'fl_name' => 'Application Management'
            ]
        );

        DB::table('tbl_micro_services')->insert(
            [
                'fl_service' => 'u3',
                'fl_name' => 'Registration Management'

            ]
        );

        DB::table('tbl_micro_services')->insert(
            [
                'fl_service' => 'u4',
                'fl_name' => 'Exam Management'
            ]
        );
    }
}

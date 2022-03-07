<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypeNoRelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_account_type')->insert(
            [
                'fl_account_type_name' => 'no account',
                'fl_account_range_a' => 0,
                'fl_account_range_z' =>0
            ]
        );
    }
}

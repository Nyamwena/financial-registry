<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('tbl_account_main_type')->insert(
            [
                'fl_account_type' => 'Asset'
            ]
        );

        DB::table('tbl_account_main_type')->insert(
            [
                'fl_account_type' => 'Balance Sheet'
            ]
        );
        DB::table('tbl_account_main_type')->insert(
            [
                'fl_account_type' => 'Revenue'
            ]
        );
        DB::table('tbl_account_main_type')->insert(
            [
                'fl_account_type' => 'Expense'
            ]
        );
        DB::table('tbl_account_main_type')->insert(
            [
                'fl_account_type' => 'Cash Flow'
            ]
        );
        DB::table('tbl_account_main_type')->insert(
            [
                'fl_account_type' => 'Liability'
            ]
        );

        DB::table('tbl_account_main_type')->insert(
            [
                'fl_account_type' => 'Equity'
            ]
        );
    }
}

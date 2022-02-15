<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chart', function (Blueprint $table) {
            //$table->id();
            $table->string('fl_account_num', length: 20)->primary();
           // $table->primary('');
            $table->string('fl_account_name', length: 100);
            $table->integer('fl_account_main_type');
            $table->integer('fl_account_sub_type_a');
            $table->integer('fl_account_sub_type_b');
            $table->boolean('fl_account_bank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chart_accounts');
    }
};

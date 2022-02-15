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
        Schema::create('tbl_period_hdr', function (Blueprint $table) {
           // $table->id();
            $table->string('fl_period_code', length: 20)->unique()->primary();
            $table->string('fl_period_name', length: 20);
            $table->date('fl_date_a');
            $table->date('fl_date_z');
            $table->boolean('fl_closed');
            $table->boolean('fl_archived');
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
        Schema::dropIfExists('account_periods');
    }
};

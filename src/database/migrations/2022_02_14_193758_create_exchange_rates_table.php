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
        Schema::create('tbl_exchange', function (Blueprint $table) {
            $table->id('fl_exchange_bulletino');
            $table->date('fl_effective_date');
            $table->unsignedBigInteger('fl_currency_code');
            $table->unsignedBigInteger('fl_currency_code_dest');
            $table->boolean('fl_bulletin_active');
            $table->timestamps();

            $table->foreign('fl_currency_code')->references('fl_currency_code')->on('tbl_currency')->onDelete('cascade');
           $table->foreign('fl_currency_code_dest')->references('fl_currency_code')->on('tbl_currency')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_rates');
    }
};

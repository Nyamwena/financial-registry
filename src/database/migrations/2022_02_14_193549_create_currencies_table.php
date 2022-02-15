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
        Schema::create('tbl_currency', function (Blueprint $table) {
            $table->id('fl_currency_code');
            $table->string('fl_currency_name', length: 100);
            $table->string('fl_currency_shortcode', length: 10);
            $table->string('fl_currency_symbol', length: 10);
            $table->boolean('fl_active');
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
        Schema::dropIfExists('currencies');
    }
};

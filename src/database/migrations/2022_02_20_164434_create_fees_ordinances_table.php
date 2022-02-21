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
        Schema::create('tbl_ordinance', function (Blueprint $table) {
            $table->id('fl_ordinance_number');
            $table->string('fl_desc', length: 50);
            $table->date('fl_date_a');
            $table->date('fl_date_z');
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
        Schema::dropIfExists('tbl_ordinance');
    }
};

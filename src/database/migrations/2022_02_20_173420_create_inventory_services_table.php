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
        Schema::create('tbl_inventory_service', function (Blueprint $table) {
           $table->id('fl_service_code');
            $table->string('fl_service_description', length: 100);
            $table->unsignedBigInteger('fl_location_code')->default(0);
            $table->double('fl_on_hand')->default(-1);
            $table->double('fl_on_order')->default(-1);
            $table->decimal('fl_unit_cost', 13,4);
            $table->decimal('fl_retail_price', 13,4);
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
        Schema::dropIfExists('tbl_inventory_service');
    }
};

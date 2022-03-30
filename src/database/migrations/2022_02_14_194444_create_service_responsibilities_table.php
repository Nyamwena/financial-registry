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
        Schema::create('tbl_responsible_service', function (Blueprint $table) {
            //$table->id();
            $table->unsignedBigInteger('fl_centre_code');
            $table->unsignedBigInteger('fl_service_code');
            $table->string('fl_period_code', length: 20);
            $table->unsignedBigInteger('fl_company_id');
            $table->foreign('fl_centre_code')->references('fl_centre_code')->on('tbl_responsibility')->onDelete('cascade');
            $table->foreign('fl_service_code')->references('fl_service_code')->on('tbl_service')->onDelete('cascade');
            $table->foreign('fl_period_code')->references('fl_period_code')->on('tbl_period_hdr')->onDelete('cascade');
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
        Schema::dropIfExists('service_responsibilities');
    }
};

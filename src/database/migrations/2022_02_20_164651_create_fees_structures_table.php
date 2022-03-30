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
        Schema::create('tbl_fees_structure', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fl_feegroup_code');
            $table->unsignedBigInteger('fl_ordinance_number');
            $table->unsignedBigInteger('fl_session_code');
            $table->unsignedBigInteger('fl_service_code');
            $table->unsignedBigInteger('fl_currency_code');
            $table->decimal('fl_amount',13,4);
            $table->unsignedBigInteger('fl_company_id');
            $table->timestamps();

            $table->foreign('fl_feegroup_code')->references('fl_feegroup_code')->on('tbl_fees_group')->onDelete('cascade');
            $table->foreign('fl_ordinance_number')->references('fl_ordinance_number')->on('tbl_ordinance')->onDelete('cascade');
            $table->foreign('fl_service_code')->references('fl_service_code')->on('tbl_service')->onDelete('cascade');
            $table->foreign('fl_currency_code')->references('fl_currency_code')->on('tbl_currency')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_fees_structure');
    }
};

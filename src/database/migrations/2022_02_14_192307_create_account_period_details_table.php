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
        Schema::create('tbl_period_dtl', function (Blueprint $table) {
            $table->id('fl_period_det_code');
            $table->string('fl_period_code', length: 20);

            $table->string('fl_period_det_name', length: 20);
            $table->date('fl_dtl_date_a');
            $table->date('fl_dtl_date_z');
            $table->unsignedBigInteger('fl_company_id');
            $table->timestamps();

            $table->foreign('fl_period_code')->references('fl_period_code')->on('tbl_period_hdr')->onDelete('cascade');

          //  $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_period_details');
    }
};

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
        Schema::create('tbl_remittance_dtl', function (Blueprint $table) {
            $table->id('fl_remittance_line_num');
            $table->unsignedBigInteger('fl_remittance_num');
            $table->string('fl_invoice_number', length: 10);
            $table->string('fl_customer_number');
            $table->decimal('fl_remittance_line_amount', 13,4);
            $table->unsignedBigInteger('fl_receipt_number');
            $table->unsignedBigInteger('fl_company_id');
            $table->timestamps();

            $table->foreign('fl_remittance_num')->references('fl_remittance_num')->on('tbl_remittance_hdr')->onDelete('cascade');
            $table->foreign('fl_invoice_number')->references('fl_invoice_number')->on('tbl_invoice_hdr')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_remittance_dtl');
    }
};

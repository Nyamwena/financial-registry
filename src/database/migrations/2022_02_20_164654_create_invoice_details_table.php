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
        Schema::create('tbl_invoice_dtl', function (Blueprint $table) {
            $table->id('fl_invoice_line_num');
            $table->string('fl_invoice_number', length: 10);
            $table->unsignedBigInteger('fl_service_code');
            $table->decimal('fl_unit_price', 13,4);
            $table->double('fl_quantity')->nullable();
            $table->decimal('fl_tax_amount', 13,4)->default(0);
            $table->double('fl_line_total')->default(0);
            $table->unsignedBigInteger('fl_company_id');
            $table->timestamps();

            $table->foreign('fl_service_code')->references('fl_service_code')->on('tbl_service')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_invoice_dtl');
    }
};

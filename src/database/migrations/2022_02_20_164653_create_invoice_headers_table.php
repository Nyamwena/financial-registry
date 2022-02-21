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
        Schema::create('tbl_invoice_hdr', function (Blueprint $table) {
            //$table->id();
            $table->string('fl_invoice_number', length: 10)->primary();
            $table->date('fl_invoice_date');
            $table->string('fl_practitioner_code',length: 10);
            $table->date('fl_service_date');
            $table->date('fl_due_date');
            $table->decimal('fl_amount_due');
            $table->boolean('fl_closed');
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
        Schema::dropIfExists('tbl_invoice_hdr');
    }
};

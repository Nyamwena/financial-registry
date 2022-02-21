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
        Schema::create('tbl_remittance_hdr', function (Blueprint $table) {
            $table->id('fl_remittance_num');
            $table->string('fl_consumer_account');
            $table->date('fl_remittance_date');
            $table->unsignedBigInteger('fl_payment_code');
            $table->unsignedBigInteger('fl_currency_code');
            $table->decimal('fl_remittance_amount', 13,4);
            $table->timestamps();

            $table->foreign('fl_consumer_account')->references('fl_consumer_account')->on('tbl_consumer')->onDelete('cascade');
            $table->foreign('fl_payment_code')->references('fl_payment_code')->on('tbl_payment_type')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_remittance_hdr');
    }
};

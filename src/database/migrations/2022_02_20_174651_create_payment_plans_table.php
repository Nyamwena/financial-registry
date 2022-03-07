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
        Schema::create('tbl_payment_plan', function (Blueprint $table) {
            $table->id('fl_payment_plan_ref');
            $table->date('fl_request_date');
            $table->string('fl_customer_number', length: 20);
            $table->string('fl_recommended_a')->nullable();
            $table->date('fl_date_recommended_a')->nullable();
            $table->string('fl_recommended_b')->nullable();
            $table->date('fl_date_recommended_b')->nullable();
            $table->string('fl_approved_by')->nullable();
            $table->date('fl_approved_date')->nullable();
            $table->decimal('fl_plan_amount',13,4);
            $table->integer('fl_instalments');
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
        Schema::dropIfExists('tbl_payment_plan');
    }
};

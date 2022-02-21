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
        Schema::create('tbl_payment_terms', function (Blueprint $table) {
          //  $table->id();
            $table->unsignedBigInteger('fl_payment_plan_ref');
            $table->integer('fl_line_number')->default(-1);
            $table->unsignedBigInteger('fl_instalment _type')->default(0);
            $table->decimal('fl_instalment _amount',13,4);
            $table->date('fl_instalment_due_date');
            $table->timestamps();

            $table->foreign('fl_payment_plan_ref')->references('fl_payment_plan_ref')->on('tbl_payment_plan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payment_terms');
    }
};

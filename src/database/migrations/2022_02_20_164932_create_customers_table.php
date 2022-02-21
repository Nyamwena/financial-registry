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
        Schema::create('tbl_consumer', function (Blueprint $table) {
            //$table->id();
            $table->string('fl_consumer_number', length: 10)->primary();
            $table->string('fl_consumer_account', length: 10)->index();
            $table->string('fl_physical_address', length: 100);
            $table->string('fl_mailing_address', length: 100)->nullable();
            $table->string('fl_city', length: 50)->nullable();
            $table->string('fl_email', length: 50)->nullable();
            $table->string('fl_mobile_number', length: 50)->nullable();
            $table->string('fl_telephone', length: 100)->nullable();
            $table->string('fl_credit_plan', length: 50)->nullable();
            $table->boolean('fl_active')->default(1);
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
        Schema::dropIfExists('tbl_consumer');
    }
};

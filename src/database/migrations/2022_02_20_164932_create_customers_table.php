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
            $table->string('fl_consumer_number', length: 20)->primary();
            $table->string('fl_consumer_account', length: 20)->index();
            $table->string('fl_firstname', length: 30);
            $table->string('fl_lastname', length: 30);
            $table->string('fl_middle_name', length: 30)->nullable();
            $table->string('fl_title', length: 10)->nullable();
            $table->string('fl_sex', length: 10)->nullable();
            $table->string('fl_physical_address', length: 100)->nullable();
            $table->string('fl_mailing_address', length: 100)->nullable();
            $table->string('fl_city', length: 50)->nullable();
            $table->string('fl_email', length: 50)->nullable();
            $table->string('fl_mobile_number', length: 50)->nullable();
            $table->string('fl_telephone', length: 100)->nullable();
            $table->string('fl_credit_plan', length: 50)->nullable();
            $table->boolean('fl_active')->default(1);
           // $table->unsignedBigInteger('fl_company_id');
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

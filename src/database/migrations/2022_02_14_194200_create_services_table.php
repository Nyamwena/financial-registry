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
        Schema::create('tbl_service', function (Blueprint $table) {
            $table->id('fl_service_code');
            $table->string('fl_service_name', length: 100);
            $table->string('fl_account_num',length: 20);
            $table->string('fl_service_dest')->unique()->nullable();
            $table->timestamps();
            $table->foreign('fl_account_num')->references('fl_account_num')->on('tbl_chart')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};

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
        Schema::create('tbl_responsibility', function (Blueprint $table) {
            $table->id('fl_centre_code');
            $table->string('fl_centre_short_code')->index();
            $table->string('fl_centre_name', length: 100);
            $table->unsignedBigInteger('fl_company_id');
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
        Schema::dropIfExists('responsibilities');
    }
};

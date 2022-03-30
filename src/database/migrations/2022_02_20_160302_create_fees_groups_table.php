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
        Schema::create('tbl_fees_group', function (Blueprint $table) {
            $table->id('fl_feegroup_code');
            $table->string('fl_description', length: 100);
            $table->string('fl_major_code1');
            $table->string('fl_minor_code1')->nullable();
            $table->string('fl_minor_code2')->nullable();
            $table->string('fl_term_code')->nullable();
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
        Schema::dropIfExists('tbl_fees_group');
    }
};

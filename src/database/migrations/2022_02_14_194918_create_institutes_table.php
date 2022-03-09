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
        Schema::create('tbl_institute', function (Blueprint $table) {
            $table->id('fl_system_code');
            $table->string('fl_registration_code', length: 50)->index();
            $table->date('fl_date_registered')->nullable();
            $table->string('fl_institution_name', length: 100);
            $table->string('fl_institution_shortname', length: 20);
            $table->integer('fl_institution_type')->nullable();
            $table->string('fl_pysicaladd1', length: 50)->nullable();
            $table->string('fl_pysicaladd2', length: 50)->nullable();
            $table->string('fl_pysicaladd3', length: 50)->nullable();
            $table->string('fl_mailadd1', length: 50)->nullable();
            $table->string('fl_mailadd2', length: 50)->nullable();
            $table->string('fl_mailadd3', length: 50)->nullable();
            $table->string('fl_gps_latitude', length: 20)->nullable();
            $table->string('fl_gps_longitude', length: 20)->nullable();
            $table->string('fl_telephone', length: 30)->nullable();
            $table->string('fl_faxnumber', length: 50)->nullable();
            $table->string('fl_mobilenumber', length: 50)->nullable();
            $table->string('fl_email', length: 50)->nullable();
            $table->string('fl_url', length: 100)->nullable();
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
        Schema::dropIfExists('institutes');
    }
};

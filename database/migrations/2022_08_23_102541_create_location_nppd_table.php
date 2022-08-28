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
        Schema::create('location_nppd', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nppd_id')->unsigned()->index();
            $table->bigInteger('location_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('nppd_id')->references('id')->on('nppds')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_nppd');
    }
};

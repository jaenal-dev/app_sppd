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
        Schema::create('nppd_transport', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nppd_id')->unsigned()->index();
            $table->bigInteger('transport_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('nppd_id')->references('id')->on('nppds')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nppd_transport');
    }
};

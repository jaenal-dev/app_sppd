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
        Schema::create('nppds', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan');
            $table->date('tgl_pergi');
            $table->date('tgl_pulang');
            $table->integer('status')->default(0)->nullable();
            $table->integer('anggaran_id');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('nppds');
    }
};

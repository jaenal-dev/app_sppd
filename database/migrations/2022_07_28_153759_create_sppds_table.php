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
        Schema::create('sppds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('no_sppd')->unique();
            $table->string('pejabat');
            $table->string('tempat_tujuan');
            $table->string('tujuan');
            $table->foreignId('transport_id');
            $table->string('lama');
            $table->string('instansi');
            $table->date('tgl_pergi');
            $table->date('tgl_pulang');
            $table->string('anggaran');
            $table->string('keterangan');
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
        Schema::dropIfExists('sppds');
    }
};

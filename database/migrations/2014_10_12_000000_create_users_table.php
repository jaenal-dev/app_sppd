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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 15)->unique();
            $table->string('name', 100);
            $table->string('image')->nullable();
            $table->char('jenis_kelamin',1);
            $table->string('pangkat', 50)->nullable();
            $table->string('esselon', 10)->nullable();
            $table->string('golongan', 10)->nullable();
            $table->boolean('role')->default(0);
            $table->string('password');
            $table->timestamps();

            //-----------------------------------------------------//
            // $table->timestamp('email_verified_at')->nullable();
            // $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

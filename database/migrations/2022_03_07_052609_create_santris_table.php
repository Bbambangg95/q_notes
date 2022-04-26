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
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('id_santri')->unique();
            $table->string('nama');
            $table->string('asal');
            $table->string('kelas');
            $table->string('semester')->nullable();
            $table->string('tahun_ajaran')->nullable();
            $table->string('awal_bergabung')->nullable();
            $table->integer('target_bulanan')->nullable();
            $table->integer('target_semester')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('santris');
    }
};

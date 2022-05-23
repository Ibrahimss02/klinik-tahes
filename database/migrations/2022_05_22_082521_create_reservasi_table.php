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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_dokter')->constrained('dokters')->onDelete('cascade');
            $table->string('nama_awal');
            $table->string('nama_tengah')->nullable();
            $table->string('nama_akhir');
            $table->string('tanggal');
            $table->string('pesan');
            $table->timestamps();

            // $table->foreign('id_pasien')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('id_dokter')->references('id')->on('dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasi');
    }
};

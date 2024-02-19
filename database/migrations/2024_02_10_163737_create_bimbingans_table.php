<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bimbingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id');
            $table->foreignId('jadwal_id');
            $table->foreignId('gurubk_id');
            $table->text('keterangan_bimbingan')->nullable();
            $table->text('balasan_bimbingan')->nullable();
            $table->string('status_bimbingan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbingans');
    }
};

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
        Schema::create('wali_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nip_walikelas')->nullable();
            $table->string('nama_walikelas');
            $table->enum('jk_walikelas', ['Laki-Laki', 'Perempuan']);
            $table->string('telp_walikelas');
            $table->string('email_walikelas');
            $table->foreignId('kelas_id');
            $table->foreignId('jurusan_id');
            $table->string('foto_walikelas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wali_kelas');
    }
};

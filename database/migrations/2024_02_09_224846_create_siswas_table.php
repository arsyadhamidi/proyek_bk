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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn_siswa')->unique();
            $table->string('nama_siswa');
            $table->enum('jk_siswa', ['Laki-Laki', 'Perempuan']);
            $table->string('tmp_lahir_siswa');
            $table->date('tgl_lahir_siswa');
            $table->string('alamat_siswa');
            $table->foreignId('jurusan_id');
            $table->foreignId('kelas_id');
            $table->string('agama_siswa');
            $table->string('telp_siswa');
            $table->string('telp_ortu_siswa');
            $table->string('email_siswa')->unique();
            $table->date('tgl_masuk_siswa');
            $table->date('tgl_lulus_siswa')->nullable();
            $table->string('nilai_siswa')->nullable();
            $table->string('keterangan_siswa')->nullable();
            $table->string('status_siswa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};

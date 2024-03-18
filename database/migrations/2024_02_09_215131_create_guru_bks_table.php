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
        Schema::create('guru_bks', function (Blueprint $table) {
            $table->id();
            $table->string('nip_gurubk')->nullable();
            $table->string('nama_gurubk');
            $table->enum('jk_gurubk', ['Laki-Laki', 'Perempuan']);
            $table->string('telp_gurubk');
            $table->string('email_gurubk');
            $table->string('foto_gurubk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_bks');
    }
};

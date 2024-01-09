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
        Schema::create('tb_absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_kegiatan');
            $table->enum('status_kehadiran', ['Hadir', 'Tidak Hadir']);
            $table->text('keterangan');
            $table->foreign('id_siswa')->references('id')->on('tb_siswa');
            $table->foreign('id_kegiatan')->references('id')->on('tb_kegiatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_absensi');
    }
};

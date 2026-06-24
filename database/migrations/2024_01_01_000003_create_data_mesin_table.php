<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_mesin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_mesin', 20)->unique();
            $table->string('nama_mesin', 200);
            $table->date('tanggal')->nullable()->default(null);
            $table->string('nama_lokasi', 100);
            $table->string('nama_department', 100);
            $table->string('safety_cover', 50)->nullable();
            $table->string('emergency_stop', 50)->nullable();
            $table->string('sensor', 50)->nullable();
            $table->string('titik_potong', 50)->nullable();
            $table->string('titik_pentalan', 50)->nullable();
            $table->string('titik_jepit', 50)->nullable();
            $table->text('pelindung_lain_jika_ada')->nullable();
            $table->string('terlindung_dari_potensi_bahaya', 50)->nullable();
            $table->string('tag_loto_di_mesin', 50)->nullable();
            $table->text('keterangan_tambahan')->nullable();
            $table->string('mesin_pernah_kecelakaan_kerja', 50)->nullable();
            $table->string('perbaikan_pelindung_mesin', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_mesin');
    }
};

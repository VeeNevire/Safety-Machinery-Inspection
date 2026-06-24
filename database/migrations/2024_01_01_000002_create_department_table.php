<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('department', function (Blueprint $table) {
            $table->bigIncrements('id_department');
            $table->foreignId('lokasi_id')->constrained('lokasi', 'lokasi_id');
            $table->string('nama_department', 200);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('department');
    }
};

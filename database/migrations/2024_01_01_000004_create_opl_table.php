<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_mesin', 20);
            $table->string('opl_tersedia', 50)->nullable();
            $table->string('manning_operator', 50)->nullable();
            $table->text('keterangan_op')->nullable();
            $table->timestamps();

            $table->foreign('no_mesin')->references('no_mesin')->on('data_mesin')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opl');
    }
};

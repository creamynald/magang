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
        Schema::create('bidang_instansis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instansi_id')->constrained('instansis');
            $table->string('nama');
            $table->string('nama_penanggung_jawab');
            $table->string('nip');
            $table->string('telepon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidang_instansis');
    }
};

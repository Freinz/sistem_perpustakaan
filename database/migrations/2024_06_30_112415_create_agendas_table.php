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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('jenis_kegiatan');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('tempat_kegiatan');
            $table->string('pelaksana_kegiatan');
            $table->string('kelengkapan_kegiatan');
            $table->string('berkas_kegiatan');
            $table->string('catatan');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('status')->default('ditunda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};

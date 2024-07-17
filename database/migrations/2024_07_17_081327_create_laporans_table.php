<?php
/// database/migrations/{timestamp}_create_laporans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anggota_id');
            $table->unsignedBigInteger('buku_id');
            $table->unsignedBigInteger('id_peminjaman');
            $table->unsignedBigInteger('id_pengembalian');
            // Tambahkan kolom-kolom lain yang diperlukan
            $table->timestamps();

            // Foreign keys
            $table->foreign('anggota_id')->references('id')->on('anggotas');
            $table->foreign('buku_id')->references('id')->on('bukus');
            $table->foreign('id_peminjaman')->references('id')->on('peminjamans');
            $table->foreign('id_pengembalian')->references('id')->on('pengembalians');
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}


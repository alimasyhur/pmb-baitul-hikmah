<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran')->nullable();
            $table->string('email');
            $table->string('jenis_pendaftar');
            $table->string('no_hp');
            $table->string('asal_sekolah');
            $table->string('alamat_sekolah');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('nama');
            $table->text('alamat');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('rekomendasi');
            $table->string('file_raport')->nullable();
            $table->string('file_foto')->nullable();
            $table->string('file_ijazah')->nullable();
            $table->string('file_rekomendasi')->nullable();
            $table->string('file_izin_ortu')->nullable();
            $table->string('file_cv')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_bayar')->default(0);
            $table->boolean('is_cetak_bukti_daftar')->default(0);
            $table->boolean('is_cetak_kartu')->default(0);
            $table->integer('is_diterima')->default(0); // 1. diterima 2. tidak diterima 0. belum dicek
            $table->integer('angkatan')->nullable();
            $table->integer('id_jalur')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftars');
    }
}

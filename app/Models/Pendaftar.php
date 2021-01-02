<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    const STATUS_BELUM_BAYAR = 'Belum Bayar';
    const STATUS_SUDAH_BAYAR = 'Sudah Bayar';
    const STATUS_BELUM_CETAK_BUKTI = 'Belum Cetak Bukti Daftar';
    const STATUS_SUDAH_CETAK_BUKTI = 'Sudah Cetak Bukti Daftar';
    const STATUS_BELUM_CETAK_KARTU = 'Belum Cetak Kartu Peserta';
    const STATUS_SUDAH_CETAK_KARTU = 'Sudah Cetak Kartu Peserta';

    protected $fillable = [
        'no_pendaftaran',
        'email',
        'jenis_pendaftar',
        'no_hp',
        'asal_sekolah',
        'alamat_sekolah',
        'tempat_lahir',
        'tanggal_lahir',
        'nama',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'rekomendasi',
        'file_raport',
        'file_foto',
        'file_ijazah',
        'file_rekomendasi',
        'file_izin_ortu',
        'file_cv',
        'is_bayar',
        'is_cetak_bukti_daftar',
        'is_cetak_kartu',
        'is_diterima',
        'angkatan',
        'id_jalur',
    ];
}

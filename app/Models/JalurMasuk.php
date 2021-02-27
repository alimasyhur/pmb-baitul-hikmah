<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JalurMasuk extends Model
{
    use HasFactory;

    protected $table = 'jalur_masuks';

    protected $fillable = [
        'nama',
        'tahun',
        'keterangan',
        'biaya_pendaftaran',
        'periode_buka',
        'periode_tutup',
        'is_aktif',
    ];

    public function pendaftars()
    {
        return $this->hasMany(Pendaftar::class, 'id_jalur');
    }
}

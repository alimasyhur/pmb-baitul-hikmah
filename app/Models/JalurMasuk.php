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
        'periode_buka',
        'periode_tutup',
    ];
}

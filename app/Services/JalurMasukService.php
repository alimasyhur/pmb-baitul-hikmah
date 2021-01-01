<?php

namespace App\Services;

use App\Models\JalurMasuk;
use App\Models\Pendaftar;
use Carbon\Carbon;

class JalurMasukService
{
    private $jalurMasuk;

    public function __construct(Pendaftar $pendaftar, JalurMasuk $jalurMasuk)
    {
        $this->pendaftar = $pendaftar;
        $this->jalurMasuk = $jalurMasuk;
    }

    public function getJalurAktif(): object
    {
        $dateNow = Carbon::now();
        $jalurMasuk = $this->jalurMasuk
            ->where('periode_buka', '<=', $dateNow)
            ->where('periode_tutup', '>=', $dateNow);

        if ($jalurMasuk->count() > 1) {
            abort(400, 'Ada lebih dari 2 Jalur Masuk Aktif. Silakan atur jalur masuk aktif Anda');
        }
        
        if ($jalurMasuk->count() == 0) {
            abort(400, 'Tidak ada PMB Aktif');
        }
        
        return $jalurMasuk->first();
    }
}

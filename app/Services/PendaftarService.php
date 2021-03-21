<?php

namespace App\Services;

use App\Models\JalurMasuk;
use App\Models\Pendaftar;
use Carbon\Carbon;

class PendaftarService
{
    private $pendaftar;
    private $jalurMasuk;

    public function __construct(Pendaftar $pendaftar, JalurMasuk $jalurMasuk)
    {
        $this->pendaftar = $pendaftar;
        $this->jalurMasuk = $jalurMasuk;
    }

    public function getNoPendaftaran(): string
    {
        $dateNow = Carbon::today();
        $nomor = '001';
        $jalurMasuk = $this->jalurMasuk
            ->where('periode_buka', '<=', $dateNow)
            ->where('periode_tutup', '>=', $dateNow)
            ->first();
        $tahun = $jalurMasuk->tahun ?? date('Y');
        $no_pendaftaran = $tahun . $nomor;
        $pendaftarAwal = $this->pendaftar
            ->where('no_pendaftaran', 'like', "$tahun%")
            ->orderBy('no_pendaftaran', 'desc')
            ->first();

        if ($pendaftarAwal) {
            $no_pendaftaran = (int) $pendaftarAwal->no_pendaftaran + 1;
        }

        return (string) $no_pendaftaran;
    }
}

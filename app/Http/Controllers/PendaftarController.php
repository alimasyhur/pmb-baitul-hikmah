<?php

namespace App\Http\Controllers;

use App\Models\JalurMasuk;
use App\Models\Pendaftar;
use App\Services\JalurMasukService;
use App\Services\PendaftarService;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PendaftarController extends Controller
{

    protected $jalurMasukService;
    protected $pendaftarService;
    protected $pdf;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        JalurMasukService $jalurMasukService,
        PendaftarService $pendaftarService,
        PDF $pdf
    ) {
        $this->jalurMasukService = $jalurMasukService;
        $this->pendaftarService = $pendaftarService;
        $this->pdf = $pdf;
    }

    public function home()
    {
        $jalurAktif = $this->jalurMasukService->getJalurAktif();

        return view('welcome', [
            'jalur_aktif' => $jalurAktif
        ]);
    }

    public function daftar(Request $request)
    {
        $request['email'] = 'jegrag4ever@gmail.com';
        $request['no_hp'] = '08156558085';
        $request['asal_sekolah'] = 'SMA Negeri 3 Surakarta';
        $request['alamat_sekolah'] = 'Solo';
        $request['tempat_lahir'] = 'Sukoharjo';
        $request['nama'] = 'Muhammad Ali Masyhur Khoiruddin';
        $request['alamat'] = 'Sukoharjo';
        $request['nama_ayah'] = 'Safawi';
        $request['nama_ibu'] = 'Nuryani Rahayu';
        $request['rekomendasi'] = 'Tokoh Masyarakat';

        $data = $request->validate([
            'email' => 'required|email',
            'nama' => 'required|max:100',
            'jenis_pendaftar' => 'required|max:100',
            'no_hp' => 'required|max:100',
            'asal_sekolah' => 'required|max:100',
            'alamat_sekolah' => 'required|max:255',
            'tempat_lahir' => 'required|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|max:255',
            'nama_ayah' => 'required|max:100',
            'nama_ibu' => 'required|max:100',
            'rekomendasi' => 'required|max:100',
            'upload_foto' => 'required|image|mimes:png,jpg|max:1024',
            'upload_surat_izin_ortu' => 'required|file|mimes:pdf|max:102400',
            'upload_cv' => 'required|file|mimes:pdf|max:102400',
            'upload_ijazah' => 'required|file|mimes:pdf|max:102400',
            'upload_raport' => 'required|file|mimes:pdf|max:102400',
            'upload_rekomendasi' => 'required|file|mimes:pdf|max:102400',
        ]);

        $jalurAktif = $this->jalurMasukService->getJalurAktif();
        $noPendaftaran = $this->pendaftarService->getNoPendaftaran();
        $angkatan = $jalurAktif->tahun;

        $data = array_merge($data, [
            'id_jalur' => $jalurAktif->id,
            'angkatan' => $angkatan,
            'no_pendaftaran' => $noPendaftaran,
        ]);

        $publicPath = "$angkatan/$noPendaftaran";
        
        $data['file_foto'] = $request->upload_foto->store($publicPath, 'public');
        $data['file_izin_ortu'] = $request->upload_surat_izin_ortu->store($publicPath, 'public');
        $data['file_cv'] = $request->upload_cv->store($publicPath, 'public');
        $data['file_ijazah'] = $request->upload_ijazah->store($publicPath, 'public');
        $data['file_raport'] = $request->upload_raport->store($publicPath, 'public');
        $data['file_rekomendasi'] = $request->upload_rekomendasi->store($publicPath, 'public');
        $data['status'] = Pendaftar::STATUS_BELUM_BAYAR;

        Pendaftar::create($data);

        session()->put('no_pendaftaran', $noPendaftaran);
        
        return redirect()->to('/success-daftar')->with('success', 'Pendaftaran Berhasil');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function successDaftar()
    {
        $noPendaftaran = session()->get('no_pendaftaran');

        if (!$noPendaftaran) {
            return redirect('check-status');
        }

        $pendaftar = Pendaftar::where('no_pendaftaran', $noPendaftaran)->first();
        $statusBayar = $pendaftar->is_bayar ? Pendaftar::STATUS_SUDAH_BAYAR : Pendaftar::STATUS_BELUM_BAYAR;

        return view('success-daftar', [
            'no_pendaftaran' => $noPendaftaran,
            'pendaftar' => $pendaftar,
            'status_bayar' => $statusBayar,
        ]);
    }

    public function checkStatus()
    {
        $noPendaftaran = session()->get('no_pendaftaran');
        if ($noPendaftaran) {
            return redirect('success-daftar');
        }

        $jalurAktif = $this->jalurMasukService->getJalurAktif();

        return view('check-status', [
            'jalur_aktif' => $jalurAktif
        ]);
    }

    public function statusDaftar(Request $request)
    {
        $request->validate([
            'no_pendaftaran' => 'required|max:100',
            'tanggal_lahir' => 'required|max:100',
        ]);

        $pendaftar = Pendaftar::where('no_pendaftaran', $request->input('no_pendaftaran'))
            ->where('tanggal_lahir', $request->input('tanggal_lahir'))
            ->first();

        if (!$pendaftar) {
            session()->flush('message', 'Kombinasi No. Pendaftaran dan Tanggal Lahir tidak tepat');
            return redirect('check-status');
        }
        
        session()->put('no_pendaftaran', $pendaftar->no_pendaftaran);

        return redirect('success-daftar');
    }

    public function cetakBuktiDaftar()
    {
        $noPendaftaran = session()->get('no_pendaftaran');

        if (!$noPendaftaran) {
            return redirect('check-status');
        }
        
        $pendaftar = Pendaftar::where('no_pendaftaran', $noPendaftaran)->first();
        $jalurAktif = JalurMasuk::where('id', $pendaftar->id_jalur)->first();
        $statusBayar = $pendaftar->is_bayar ? Pendaftar::STATUS_SUDAH_BAYAR : Pendaftar::STATUS_BELUM_BAYAR;

        return view('cetak-bukti-daftar', [
            'jalur_aktif' => $jalurAktif,
            'pendaftar' => $pendaftar,
            'status_bayar' => $statusBayar,
        ]);
    }

    public function generateBuktiDaftar()
    {
        $noPendaftaran = session()->get('no_pendaftaran');

        if (!$noPendaftaran) {
            return redirect('check-status');
        }

        $pendaftar = Pendaftar::where('no_pendaftaran', $noPendaftaran)->first();
        $jalurAktif = JalurMasuk::where('id', $pendaftar->id_jalur)->first();

        $pendaftar->update(['is_cetak_bukti_daftar' => 1]);

        $statusBayar = $pendaftar->is_bayar ? Pendaftar::STATUS_SUDAH_BAYAR : Pendaftar::STATUS_BELUM_BAYAR;
        $pdf = $this->pdf->loadView('cetak-bukti-daftar', [
            'jalur_aktif' => $jalurAktif,
            'pendaftar' => $pendaftar,
            'status_bayar' => $statusBayar,
        ]);
        return $pdf->download("$noPendaftaran-bukti-daftar.pdf");
    }

    public function previewKartuPeserta()
    {
        $noPendaftaran = session()->get('no_pendaftaran');

        if (!$noPendaftaran) {
            return redirect('check-status');
        }

        $pendaftar = Pendaftar::where('no_pendaftaran', $noPendaftaran)->first();
        $jalurAktif = JalurMasuk::where('id', $pendaftar->id_jalur)->first();

        return view('preview-kartu-peserta', [
            'jalur_aktif' => $jalurAktif,
            'pendaftar' => $pendaftar,
        ]);
    }

    public function generateKartuPeserta()
    {
        $noPendaftaran = session()->get('no_pendaftaran');

        if (!$noPendaftaran) {
            return redirect('check-status');
        }

        $pendaftar = Pendaftar::where('no_pendaftaran', $noPendaftaran)->first();
        $jalurAktif = JalurMasuk::where('id', $pendaftar->id_jalur)->first();

        $pendaftar->update(['is_cetak_kartu' => 1]);

        $pdf = $this->pdf->loadView('preview-kartu-peserta', [
            'jalur_aktif' => $jalurAktif,
            'pendaftar' => $pendaftar,
        ]);
        return $pdf->download("$noPendaftaran-kartu-peserta.pdf");
    }

    public function pendaftarLogin()
    {
        return redirect('check-status');
    }

    public function pendaftarLogout()
    {
        session()->flush();
        return redirect('check-status');
    }

    public function pembayaran()
    {
        $noPendaftaran = session()->get('no_pendaftaran');
        if (!$noPendaftaran) {
            return redirect('check-status');
        }

        $pendaftar = Pendaftar::where('no_pendaftaran', $noPendaftaran)->first();
        $jalurAktif = JalurMasuk::where('id', $pendaftar->id_jalur)->first();

        return view('pembayaran', [
            'jalur_aktif' => $jalurAktif,
            'pendaftar' => $pendaftar,
        ]);
    }

    public function uploadPembayaran(Request $request)
    {
        $noPendaftaran = session()->get('no_pendaftaran');
        if (!$noPendaftaran) {
            return redirect('check-status');
        }

        $data = $request->validate([
            'upload_pembayaran' => 'image|mimes:png,jpg|max:1024',
        ]);

        $pendaftar = Pendaftar::where('no_pendaftaran', $noPendaftaran)->firstOrFail();
        $publicPath = "$pendaftar->angkatan/$noPendaftaran";
        $filePembayaran = $request->upload_pembayaran->store($publicPath, 'public');
        $pendaftar->update([
            'file_pembayaran' => $filePembayaran,
            'is_bayar' => 1,
            'status' => Pendaftar::STATUS_SUDAH_BAYAR,
        ]);

        return redirect()->to('/success-daftar')->with('success', 'Bukti Pembayaran berhasil di upload');
    }
}

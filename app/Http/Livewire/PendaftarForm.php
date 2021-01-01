<?php

namespace App\Http\Livewire;

use App\Models\Pendaftar;
use App\Services\JalurMasukService;
use App\Services\PendaftarService;
use Livewire\Component;
use Livewire\WithFileUploads;

class PendaftarForm extends Component
{
    use WithFileUploads;

    public $email;
    public $jenis_pendaftar;
    public $no_hp;
    public $asal_sekolah;
    public $alamat_sekolah;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $nama;
    public $alamat;
    public $nama_ayah;
    public $nama_ibu;
    public $rekomendasi;
    public $upload_foto;
    public $upload_surat_izin_ortu;
    public $upload_cv;
    public $upload_ijazah;
    public $upload_raport;
    public $upload_rekomendasi;

    protected $rules = [
        'email' => 'required|email',
        'nama' => 'required|max:100',
        'jenis_pendaftar' => 'required|max:100',
        'no_hp' => 'required|max:100',
        'asal_sekolah' => 'required|max:100',
        'alamat_sekolah' => 'required|max:255',
        'tempat_lahir' => 'required|max:100',
        'tanggal_lahir' => 'required|max:100',
        'alamat' => 'required|max:255',
        'nama_ayah' => 'required|max:100',
        'nama_ibu' => 'required|max:100',
        'rekomendasi' => 'required|max:100',
        'upload_foto' => 'image|mimes:png,jpg|max:1024',
        'upload_surat_izin_ortu' => 'file|mimes:pdf|max:102400',
        'upload_cv' => 'file|mimes:pdf|max:102400',
        'upload_ijazah' => 'file|mimes:pdf|max:102400',
        'upload_raport' => 'file|mimes:pdf|max:102400',
        'upload_rekomendasi' => 'file|mimes:pdf|max:102400',
    ];

    public function submit(PendaftarService $pendaftarService, JalurMasukService $jalurMasukService)
    {
        session()->flush();

        $this->email = 'jegrag4ever@gmail.com';
        $this->jenis_pendaftar = 'Pribadi';
        $this->no_hp = '08156558085';
        $this->asal_sekolah = 'SMA Negeri 3 Surakarta';
        $this->alamat_sekolah = 'Solo';
        $this->tempat_lahir = 'Sukoharjo';
        $this->tanggal_lahir = '10-07-1994';
        $this->nama = 'Muhammad Ali Masyhur Khoiruddin';
        $this->alamat = 'Sukoharjo';
        $this->nama_ayah = 'Safawi';
        $this->nama_ibu = 'Nuryani Rahayu';
        $this->rekomendasi = 'Tokoh Masyarakat';

        $data = $this->validate();
        $jalurAktif = $jalurMasukService->getJalurAktif();
        $noPendaftaran = $pendaftarService->getNoPendaftaran();
        $angkatan = $jalurAktif->tahun;

        $data = array_merge($data, [
            'id_jalur' => $jalurAktif->id,
            'angkatan' => $angkatan,
            'no_pendaftaran' => $noPendaftaran,
        ]);
        
        $data['file_foto'] = $this->upload_foto->store("$angkatan/photos", 'public');
        $data['file_izin_ortu'] = $this->upload_surat_izin_ortu->store("$angkatan/surat-izin-ortu", 'public');
        $data['file_cv'] = $this->upload_cv->store("$angkatan/cv", 'public');
        $data['file_ijazah'] = $this->upload_ijazah->store("$angkatan/ijazah", 'public');
        $data['file_raport'] = $this->upload_raport->store("$angkatan/raport", 'public');
        $data['file_rekomendasi'] = $this->upload_rekomendasi->store("$angkatan/rekomendasi", 'public');

        Pendaftar::create($data);
        
        session()->put('no_pendaftaran', $noPendaftaran);
        
        return redirect()->to('/success-daftar');
    }

    public function render(JalurMasukService $jalurMasukService)
    {
        $jalurAktif = $jalurMasukService->getJalurAktif();

        return view('livewire.pendaftar-form', [
            'jalur_aktif' => $jalurAktif
        ]);
    }
}

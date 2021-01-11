<?php

namespace App\Http\Controllers;

use App\DataTables\JalurMasukDataTable;
use App\Models\JalurMasuk;
use App\Models\Pendaftar;
use App\Services\JalurMasukService;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminPendaftarController extends Controller
{
    protected $jalurMasukService;

    public function __construct(JalurMasukService $jalurMasukService)
    {
        $this->middleware('auth');
        $this->jalurMasukService = $jalurMasukService;
    }

    public function index()
    {
        $jalurAktif = $this->jalurMasukService->getJalurAktif();
        $pendaftar = Pendaftar::all();
        return view('pendaftar.index', [
            'model' => $pendaftar,
            'jalurAktif' => $jalurAktif
        ]);
    }

    public function create()
    {
        if ($this->jalurMasukService->getTotalJalurAktif()) {
            return redirect('/admin/pendaftar')->with('error', 'Ada jalur aktif. Tidak dapat menambah jalur baru');
        }

        return view('pendaftar.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:100',
            'tahun' => 'required|max:4',
            'keterangan' => 'required|max:100',
            'periode_buka' => 'required|date',
            'periode_tutup' => 'required|date',
        ]);

        JalurMasuk::create($data);

        return redirect('/admin/pendaftar')->with('success', 'Jalur Masuk Baru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = Pendaftar::findOrFail($id);

        return view('pendaftar.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
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
        ]);
        Pendaftar::whereId($id)->update($data);

        return redirect('/admin/pendaftar')->with('success', 'Data Pendaftar berhasil di edit');
    }

    public function verifikasiPembayaran($id)
    {
        $pendaftar = Pendaftar::whereId($id)->first();
        $filepath = Storage::url($pendaftar->file_pembayaran);

        return view('pendaftar.verifikasi', [
            'model' => $pendaftar,
            'filepath' => $filepath
        ]);
    }

    public function updatePembayaran(Request $request, $id)
    {
        $data = $request->validate([
            'is_bayar' => 'required|max:100',
        ]);
        Pendaftar::whereId($id)->update($data);

        return redirect('/admin/pendaftar')->with('success', 'Data Pendaftar berhasil di edit');
    }
}

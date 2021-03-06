<?php

namespace App\Http\Controllers;

use App\DataTables\JalurMasukDataTable;
use App\Models\JalurMasuk;
use App\Services\JalurMasukService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class JalurMasukController extends Controller
{
    protected $jalurMasukService;

    public function __construct(JalurMasukService $jalurMasukService)
    {
        $this->middleware('auth');
        $this->jalurMasukService = $jalurMasukService;
    }

    public function index()
    {
        $jalurMasuk = JalurMasuk::all();
        return view('jalur-masuk.index', ['jalurMasuk' => $jalurMasuk]);
    }

    public function create()
    {
        if ($this->jalurMasukService->getTotalJalurAktif()) {
            return redirect('/admin/jalur-masuk')->with('error', 'Ada jalur aktif. Tidak dapat menambah jalur baru');
        }

        return view('jalur-masuk.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:100',
            'tahun' => 'required|max:4',
            'keterangan' => 'required|max:100',
            'biaya_pendaftaran' => 'required|max:100',
            'periode_buka' => 'required|date',
            'periode_tutup' => 'required|date',
            'is_aktif' => 'required|integer',
        ]);

        JalurMasuk::create($data);

        return redirect('/admin/jalur-masuk')->with('success', 'Jalur Masuk Baru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = JalurMasuk::findOrFail($id);

        return view('jalur-masuk.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required|max:100',
            'tahun' => 'required|max:4',
            'keterangan' => 'required|max:100',
            'biaya_pendaftaran' => 'required|max:100',
            'periode_buka' => 'required|date',
            'periode_tutup' => 'required|date',
            'is_aktif' => 'required|integer',
        ]);
        JalurMasuk::whereId($id)->update($data);

        return redirect('/admin/jalur-masuk')->with('success', 'Jalur Masuk Baru berhasil di edit');
    }

    public function destroy($id)
    {
        $model = JalurMasuk::findOrFail($id);
        if ($model->pendaftars()->count() > 0) {
            return redirect('/admin/jalur-masuk')->with('warning', 'TIdak dapat dihapus. Sudah ada pendaftar di jalur ini');
        }
        $model->delete();
        return redirect('/admin/jalur-masuk')->with('success', 'Jalur Masuk Baru berhasil di hapus');
    }
}

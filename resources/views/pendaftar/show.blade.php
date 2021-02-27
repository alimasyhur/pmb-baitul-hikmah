@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Detail Peserta {{ $jalurAktif->nama }} {{ $jalurAktif->tahun }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>No. Pendaftaran</td>
                                <td>
                                    {{ $pendaftar->no_pendaftaran }}
                                </td>
                                <td>
                                    <img src="{{ url($foto) }}" style="width: 80px; height: 100px">
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td colspan="2">{{ $pendaftar->email }}</td>
                            </tr>
                            <tr>
                                <td>Templat, Tanggal Lahir</td>
                                <td colspan="2">{{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td colspan="2">{{ $pendaftar->nama }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Pendaftar</td>
                                <td colspan="2">{{ $pendaftar->jenis_pendaftar }}</td>
                            </tr>
                            <tr>
                                <td>Alamat Lengkap</td>
                                <td colspan="2">{{ $pendaftar->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Asal Sekolah/Ma'had</td>
                                <td colspan="2">{{ $pendaftar->asal_sekolah }}</td>
                            </tr>
                            <tr>
                                <td>Alamat Asal Sekolah/Ma'had</td>
                                <td colspan="2">{{ $pendaftar->alamat_sekolah }}</td>
                            </tr>
                            <tr>
                                <td>Nama Ayah</td>
                                <td colspan="2">{{ $pendaftar->nama_ayah }}</td>
                            </tr>
                            <tr>
                                <td>Nama Ibu</td>
                                <td colspan="2">{{ $pendaftar->nama_ibu }}</td>
                            </tr>
                            <tr>
                                <td>Rekomendasi</td>
                                <td colspan="2">{{ $pendaftar->rekomendasi }}</td>
                            </tr>
                            <tr>
                                <td>Status Pembayaran</td>
                                <td colspan="2">
                                    @if($pendaftar->is_bayar == 0)
                                    <label class="btn bg-gradient-warning btn-xs">Belum Bayar</label>
                                    <a href="/pembayaran">Klik disini</a>
                                    @elseif($pendaftar->is_bayar == 1)
                                    <label class="btn bg-gradient-warning btn-xs">Pembayaran belum terverifikasi</label>
                                    @elseif($pendaftar->is_bayar == 2)
                                    <label class="btn bg-gradient-success btn-xs">Pembayaran valid</label>
                                    @elseif($pendaftar->is_bayar == 3)
                                    <label class="btn bg-gradient-danger btn-xs">Pembayaran tidak valid. Lakukan Upload Bukti Pembayaran ulang</label>
                                    <a href="/pembayaran">Klik disini</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>File Raport</td>
                                <td colspan="2"><a href="{{ url('storage/' . $pendaftar->file_raport) }}" target="_blank">Open File</a></td>
                            </tr>
                            <tr>
                                <td>File Ijazah</td>
                                <td colspan="2"><a href="{{ url('storage/' . $pendaftar->file_ijazah) }}" target="_blank">Open File</a></td>
                            </tr>
                            <tr>
                                <td>File Rekomendasi</td>
                                <td colspan="2"><a href="{{ url('storage/' . $pendaftar->file_rekomendasi) }}" target="_blank">Open File</a></td>
                            </tr>
                            <tr>
                                <td>File Izin Ortu</td>
                                <td colspan="2"><a href="{{ url('storage/' . $pendaftar->file_izin_ortu) }}" target="_blank">Open File</a></td>
                            </tr>
                            <tr>
                                <td>File CV</td>
                                <td colspan="2"><a href="{{ url('storage/' . $pendaftar->file_cv) }}" target="_blank">Open File</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <a href="{{ route('pendaftar.seleksi', $pendaftar->id_jalur) }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection
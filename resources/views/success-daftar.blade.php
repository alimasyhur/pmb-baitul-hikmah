@extends('layouts.sp')

@section('content')
@livewireStyles
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Nomor Pendaftaran <b>{{ session('no_pendaftaran') }}</b>.
                        Nomor ini adalah identitas Anda selama PMB. Simpan baik-baik!</h3>
                </div>
                <div class="card-body">
                    <h6 class="card-title"><b>Identitas Pendaftaran Anda</b></h6>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>No. Pendaftaran</td>
                                <td>{{ $pendaftar->no_pendaftaran }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>{{ $pendaftar->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $pendaftar->nama }}</td>
                            </tr>
                            <tr>
                                <td>Status Pembayaran</td>
                                <td>
                                    @if($pendaftar->is_bayar == 0)
                                    <label class="btn bg-gradient-warning btn-xs">Belum Bayar</label>
                                    <a href="/pembayaran">Klik disini</a>
                                    @elseif($pendaftar->is_bayar == 1)
                                    <label class="btn bg-gradient-primary btn-xs">Anda sudah upload</label>
                                    <label class="btn bg-gradient-warning btn-xs">Pembayaran belum terverifikasi</label>
                                    @elseif($pendaftar->is_bayar == 2)
                                    <label class="btn bg-gradient-primary btn-xs">Anda sudah upload</label>
                                    <label class="btn bg-gradient-success btn-xs">Pembayaran valid</label>
                                    @elseif($pendaftar->is_bayar == 3)
                                    <label class="btn bg-gradient-danger btn-xs">Pembayaran tidak valid. Lakukan Upload Bukti Pembayaran ulang</label>
                                    <a href="/pembayaran">Klik disini</a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <p class="card-text">
                        <b>Silakan Lakukan Langkah dibawah ini untuk menyelesaikan tahapan Pendaftaran Anda:</b>
                    <ol>
                        <li>Lakukan Cetak Bukti Pendaftaran Anda. Simpan baik-baik Bukti Pendaftaran Anda.
                            <a href="{{ route('generate-bukti-daftar') }}" class="btn btn-primary btn-xs">Cetak Bukti Pendaftaran</a>
                        </li>
                        <li>Lakukan Pembayaran Biaya Pendaftaran dan Biaya Ujian.
                            <a href="{{ route('generate-cara-pembayaran') }}" class="btn btn-primary btn-xs">Cetak Petunjuk Cara Pembayaran</a>
                        </li>
                        <li>Upload Bukti Pembayaran Anda.
                            @if($pendaftar->is_bayar == 0)
                            <a href="/pembayaran">Klik disini</a>
                            @elseif($pendaftar->is_bayar == 1)
                            <label class="btn bg-gradient-primary btn-xs">Anda sudah upload</label>
                            <label class="btn bg-gradient-warning btn-xs">Pembayaran belum terverifikasi</label>
                            @elseif($pendaftar->is_bayar == 2)
                            <label class="btn bg-gradient-primary btn-xs">Anda sudah upload</label>
                            <label class="btn bg-gradient-success btn-xs">Pembayaran valid</label>
                            @elseif($pendaftar->is_bayar == 3)
                            <label class="btn bg-gradient-danger btn-xs">Pembayaran tidak valid. Lakukan Upload Bukti Pembayaran ulang</label>
                            <a href="/pembayaran">Klik disini</a>
                            @endif
                        </li>
                        <li>Lakukan Konfirmasi Bukti Pembayaran Anda untuk mempercepat verifikasi Data Pendaftaran Anda. @if($pendaftar->is_bayar == 1) <a href="https://api.whatsapp.com/send?phone=6285770189272&text=Assalamu'alaikum.%20Saya%20Telah%20melakukan%20transfer%20bukti%20pembayaran%20pendaftaran.%20Mohon%20segera%20diverifikasi%20ya.%20Nomor%20Pendaftaran:%20{{ $pendaftar->no_pendaftaran }}" target="_blank"><b>Konfirmasi WA</b></a> @endif</li>
                        <li>Lakukan Cetak Kartu Peserta PMB - Baitul Hikmah.
                            @if($pendaftar->is_bayar == 2)
                            <a href="{{ route('generate-kartu-peserta') }}" class="btn btn-primary btn-xs" target="_blank">Cetak Kartu Peserta</a>
                            @endif
                        </li>
                    </ol>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@livewireScripts
@endsection
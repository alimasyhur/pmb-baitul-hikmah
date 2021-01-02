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
                                <td>Status Pembayaran</td>
                                <td>{{ $status_bayar }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <p class="card-text">
                        <b>Silakan Lakukan Langkah dibawah ini untuk menyelesaikan tahapan Pendaftaran Anda:</b>
                        <ol>
                            <li>Simpan baik-baik nomor Pendaftaran Anda. Nomor ini akan digunakan sebagai identitas Anda selama PMB</li>
                            <li>Lakukan Cetak Bukti Pendaftaran Anda. Simpan baik-baik Bukti Pendaftaran Anda. <b>Cetak Bukti Pendaftaran</b></li>
                            <li>Lakukan Pembayaran Biaya Pendaftaran dan Biaya Ujian. <b>Cetak Cara Pembayaran</b></li>
                            <li>Upload Bukti Pembayaran Anda. <b>Klik disini</b></li>
                            <li>Lakukan Konfirmasi Bukti Pembayaran Anda untuk mempercepat verifikasi Data Pendaftaran Anda. <b>Konfirmasi WA</b></li>
                            <li>Lakukan Cetak Kartu Peserta PMB - Baitul Hikmah. <b>Cetak Kartu Peserta</b></li>
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
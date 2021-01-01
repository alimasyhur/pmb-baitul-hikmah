@extends('layouts.sp')

@section('content')
@livewireStyles
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Pendaftaran Anda Berhasil. Nomor Pendaftaran <b>{{ session('no_pendaftaran') }}</b>.
                        Nomor ini adalah identitas Anda selama PMB. Simpan baik-baik!</h3>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Silakan Lakukan Langkah dibawah ini untuk menyelesaikan tahapan Pendaftaran Anda:</h6>
                    <p class="card-text">
                        <ol>
                            <li>Simpan baik-baik nomor Pendaftaran Anda. Nomor ini akan digunakan sebagai identitas Anda selama PMB</li>
                            <li>Lakukan Cetak Bukti Pendaftaran Anda. Simpan baik-baik Bukti Pendaftaran Anda</li>
                            <li>Lakukan Pembayaran Biaya Pendaftaran dan Biaya Ujian</li>
                            <li>Upload Bukti Pembayaran Anda</li>
                            <li>Lakukan Konfirmasi Bukti Pembayaran Anda untuk mempercepat verifikasi Data Pendaftaran Anda</li>
                            <li>Lakukan Cetak Kartu Peserta PMB - Baitul Hikmah</li>
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
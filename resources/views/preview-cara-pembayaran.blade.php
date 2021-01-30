<!DOCTYPE html>
<html>

<head>
    <title>Generate PDF Laravel 8 - phpcodingstuff.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style type="text/css">
    h2 {
        text-align: center;
        font-size: 16px;
        margin-bottom: 50px;
    }

    p {
        text-align: left;
        font-size: 11px;
    }

    body {
        /* background: #f2f2f2; */
    }

    .section {
        margin-top: 30px;
        padding: 50px;
        background: #fff;
    }

    .pdf-btn {
        margin-top: 30px;
    }

    td {
        font-size: 12px;
    }
</style>

<body>
    <div class="container">
        <div class="col-md-8 section offset-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2>Petunjuk Cara Pembayaran - {{ $jalur_aktif->nama }} Tahun {{ $jalur_aktif->tahun }}</h2>
                </div>
                <div class="panel-body">
                    <div class="main-div">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>No. Pendaftaran</td>
                                    <td>{{ $pendaftar->no_pendaftaran }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>{{ $pendaftar->nama }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <p>Silakan Lakukan Transfer Pembayaran Pendaftaran ke Rekening dibawah ini.</p>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>BNI Syariah</td>
                                </tr>
                                <tr>
                                    <td>Nomor Rekening</td>
                                    <td>0803067995</td>
                                </tr>
                                <tr>
                                    <td>Atas Nama</td>
                                    <td>Mohammad Hasan Rifai</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>Harap mencantumkan No. Pendaftaran Anda {{ $pendaftar->no_pendaftaran }} dalam catatan transfer Anda untuk memudahkan Kami dalam melakukan verifikasi Bukti Pembayaran Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
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

    body {
        background: #f2f2f2;
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
                    <h2>Bukti Pendaftaran - {{ $jalur_aktif->nama }} Tahun {{ $jalur_aktif->tahun }}</h2>
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
                                    <td>Email</td>
                                    <td>{{ $pendaftar->email }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>{{ $pendaftar->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Utusan Pendaftar</td>
                                    <td>{{ $pendaftar->jenis_pendaftar }}</td>
                                </tr>
                                <tr>
                                    <td>No HP/Telp</td>
                                    <td>{{ $pendaftar->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>{{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Lengkap</td>
                                    <td>{{ $pendaftar->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Asal Sekolah/Ma'had</td>
                                    <td>{{ $pendaftar->asal_sekolah }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Sekolah/Ma'had</td>
                                    <td>{{ $pendaftar->alamat_sekolah }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ayah / Ibu</td>
                                    <td>{{ $pendaftar->nama_ayah }} / {{ $pendaftar->nama_ibu }}</td>
                                </tr>
                                <tr>
                                    <td>Rekomendasi</td>
                                    <td>{{ $pendaftar->rekomendasi }}</td>
                                </tr>
                                <tr>
                                    <td>Status Pembayaran</td>
                                    <td>{{ $status_bayar }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center pdf-btn">
                    <a href="{{ route('generate-bukti-daftar') }}" class="btn btn-primary">Generate PDF</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
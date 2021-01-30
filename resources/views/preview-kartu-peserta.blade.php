<!DOCTYPE html>
<html>

<head>
    <title>Generate PDF Laravel 8 - phpcodingstuff.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                    <h2>Kartu Peserta - {{ $jalur_aktif->nama }} Tahun {{ $jalur_aktif->tahun }}</h2>
                </div>
                <div class="panel-body">
                    <div class="main-div">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>No. Pendaftaran</td>
                                    <td width="120 px">{{ $pendaftar->no_pendaftaran }}
                                    </td>
                                    <td>
                                        <img src="{{ public_path($filepath) }}" style="width: 80px; height: 100px">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td colspan="2">{{ $pendaftar->email }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td colspan="2">{{ $pendaftar->nama }}</td>
                                </tr>
                                <tr>
                                    <td>No HP/Telp</td>
                                    <td colspan="2">{{ $pendaftar->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td colspan="2">{{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Lengkap</td>
                                    <td colspan="2">{{ $pendaftar->alamat }}</td>
                                </tr>
                            </tbody>
                        </table>

                        {!! $jalur_aktif->keterangan !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
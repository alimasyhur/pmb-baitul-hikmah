@extends('layouts.sp')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Formulir {{ $jalur_aktif->nama }} Tahun {{ $jalur_aktif->tahun }}</h3>
                </div>
                <div class="card-body">
                    <br>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>No. Pendaftaran</td>
                                <td>{{ $pendaftar->no_pendaftaran }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $pendaftar->nama }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <form method="POST" action="{{ route('upload-pembayaran') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="upload_pembayaran">Upload Bukti Transfer Pembayaran <small>(File Format: jpg, png)</small></label>
                                <input type="file" class="form-control @error('upload_pembayaran') is-invalid @enderror id=" upload_pembayaran" name="upload_pembayaran">
                                @error('upload_pembayaran') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

@endsection
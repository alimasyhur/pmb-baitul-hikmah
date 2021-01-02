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
                    <div>
                        <h3 class="card-title">Masukkan No. Pendaftaran dan Tanggal Lahir untuk melihat Status Pendaftaran</h3>
                    </div>
                    <br>

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('status-daftar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="no_pendaftaran">No. Pendaftaran</label>
                                <input type="text" id="no_pendaftaran" class="form-control @error('no_pendaftaran') is-invalid @enderror" placeholder="Masukkan Nomor Pendaftaran" name="no_pendaftaran">
                                @error('no_pendaftaran') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tanggal_lahir">Tanggal Lahir <small>(Format: TTTT-BB-HH)</small></label>
                                <input type="text" id="nama" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir">
                                @error('tanggal_lahir') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Cek Status</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

@endsection
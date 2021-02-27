@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Edit Jalur PMB</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('jalur-masuk.update', $model->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Jalur PMB" name="nama" value="{{ $model->nama }}">
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="tahun">Tahun / Angkatan</label>
                                <input type="year" placeholder="YYYY" class="form-control @error('tahun') is-invalid @enderror" id="inputName" placeholder="Masukkan Tahun / Angkatan" name="tahun" value="{{ $model->tahun }}">
                                @error('tahun') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" placeholder="Masukkan Keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="inputName" name="keterangan" value="{{ $model->keterangan }}">
                                @error('keterangan') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="biaya_pendaftaran">Biaya Pendaftaran</label>
                                <input type="text" placeholder="Masukkan Biaya Pendaftaran" class="form-control @error('biaya_pendaftaran') is-invalid @enderror" id="biaya_pendaftaran" name="biaya_pendaftaran" value="{{ $model->biaya_pendaftaran }}">
                                @error('biaya_pendaftaran') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputPeriodeBuka">Periode Buka</label>
                                <input type="date" placeholder="Masukkan Periode Buka" class="form-control @error('periode_buka') is-invalid @enderror" id="inputPeriodeBuka" name="periode_buka" value="{{ $model->periode_buka }}">
                                @error('periode_buka') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputPeriodeTutup">Periode Tutup</label>
                                <input type="date" placeholder="Masukkan Periode Tutup" class="form-control @error('periode_tutup') is-invalid @enderror" id="inputPeriodeTutup" name="periode_tutup" value="{{ $model->periode_tutup }}">
                                @error('periode_tutup') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="is_aktif">Status Aktif</label>
                                <select class="form-control @error('is_aktif') is-invalid @enderror" id="is_aktif" name="is_aktif">
                                    <option value="" @if($model->is_aktif == "") selected @endif >-- Pilih Status Aktif --</option>
                                    <option value=0 @if($model->is_aktif == 0) selected @endif >Tidak</option>
                                    <option value=1 @if($model->is_aktif == 1) selected @endif >Ya</option>
                                </select>
                                @error('is_aktif') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('jalur-masuk.index') }}" class="btn btn-primary">Kembali</a>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

@endsection
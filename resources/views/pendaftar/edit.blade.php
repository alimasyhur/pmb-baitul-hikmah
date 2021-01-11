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
                    <form method="POST" action="{{ route('pendaftar.update', $model->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $model->email }}" placeholder="Masukkan Email Anda" name="email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nama">Nama Lengkap <small>(Sesuai Ijazah/KTP)</small></label>
                                <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $model->nama }}" placeholder="Masukkan Nama Lengkap" name="nama">
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="jenis_pendaftar">Utusan Pendaftar</label>
                                <select class="form-control @error('jenis_pendaftar') is-invalid @enderror" id="jenis_pendaftar" name="jenis_pendaftar">
                                    <option value="" @if($model->jenis_pendaftar == "") selected @endif >-- Pilih Jenis Utusan --</option>
                                    <option value="Utusan Lembaga" @if($model->jenis_pendaftar == "Utusan Lembaga") selected @endif >Utusan Lembaga</option>
                                    <option value="Pribadi" @if($model->jenis_pendaftar == "Pribadi") selected @endif >Pribadi</option>
                                </select>
                                @error('jenis_pendaftar') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="no_hp">No HP/Telp <small>(Yang dapat dihubungi)</small></label>
                                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" value="{{ $model->no_hp }}" id="no_hp" placeholder="Masukan No Hp/Telepon yang dapat dihubungi" name="no_hp">
                                @error('no_hp') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ $model->tempat_lahir }}" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" name="tempat_lahir">
                                @error('tempat_lahir') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" placeholder="YYYY-MM-DD" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ $model->tanggal_lahir }}" id="inputName" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir">
                                @error('tanggal_lahir') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ $model->alamat }}" id="alamat" placeholder="Masukkan Alamat Lengkap" name="alamat">
                            @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="asal_sekolah">Asal Sekolah/Ma'had</label>
                                <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" value="{{ $model->asal_sekolah }}" id="asal_sekolah" placeholder="Masukkan Asal Sekolah/Ma'had" name="asal_sekolah">
                                @error('asal_sekolah') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="alamat_sekolah">Alamat Asal Sekolah/Ma'had</label>
                                <input type="text" class="form-control @error('alamat_sekolah') is-invalid @enderror" value="{{ $model->alamat_sekolah }}" id="alamat_sekolah" placeholder="Masukkan Alamat Asal Sekolah/Ma'had" name="alamat_sekolah">
                                @error('alamat_sekolah') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" value="{{ $model->nama_ayah }}" id="nama_ayah" placeholder="Masukkan Nama Ayah" name="nama_ayah">
                                @error('nama_ayah') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" value="{{ $model->nama_ibu }}" id="nama_ibu" placeholder="Masukkan Nama Ibu" name="nama_ibu">
                                @error('nama_ibu') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rekomendasi">Rekomendasi</label>
                            <input type="text" class="form-control @error('rekomendasi') is-invalid @enderror" value="{{ $model->rekomendasi }}" id="rekomendasi" placeholder="Contoh: Rekomendasi dari Tokoh Masyarakat atau Lembaga" name="rekomendasi">
                            @error('rekomendasi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

@endsection
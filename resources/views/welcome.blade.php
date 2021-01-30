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
                    <h3 class="card-title">Silakan Isi FORMULIR dengan Lengkap & Data yang Benar</h3>

                    <p class="card-text">
                    <ol>
                        <li>Mulai segala sesuatu dengan Bismillah.</li>
                        <li>Perhatikan penggunaan huruf besar dan kecil. Jangan menjawab dengan huruf capital semua guna memudahkan kami dalam merekap data</li>
                    </ol>
                    </p>

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('daftar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email Anda" name="email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nama">Nama Lengkap <small>(Sesuai Ijazah/KTP)</small></label>
                                <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" name="nama">
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="jenis_pendaftar">Utusan Pendaftar</label>
                                <select class="form-control @error('jenis_pendaftar') is-invalid @enderror" id="jenis_pendaftar" name="jenis_pendaftar">
                                    <option value="">-- Pilih Jenis Utusan --</option>
                                    <option value="Utusan Lembaga">Utusan Lembaga</option>
                                    <option value="Pribadi">Pribadi</option>
                                </select>
                                @error('jenis_pendaftar') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="no_hp">No HP/Telp <small>(Yang dapat dihubungi)</small></label>
                                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukan No Hp/Telepon yang dapat dihubungi" name="no_hp">
                                @error('no_hp') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" name="tempat_lahir">
                                @error('tempat_lahir') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" placeholder="YYYY-MM-DD" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="inputName" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir">
                                @error('tanggal_lahir') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat Lengkap" name="alamat">
                            @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="asal_sekolah">Asal Sekolah/Ma'had</label>
                                <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror id=" asal_sekolah" placeholder="Masukkan Asal Sekolah/Ma'had" name="asal_sekolah">
                                @error('asal_sekolah') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="alamat_sekolah">Alamat Asal Sekolah/Ma'had</label>
                                <input type="text" class="form-control @error('alamat_sekolah') is-invalid @enderror id=" alamat_sekolah" placeholder="Masukkan Alamat Asal Sekolah/Ma'had" name="alamat_sekolah">
                                @error('alamat_sekolah') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror id=" nama_ayah" placeholder="Masukkan Nama Ayah" name="nama_ayah">
                                @error('nama_ayah') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror id=" nama_ibu" placeholder="Masukkan Nama Ibu" name="nama_ibu">
                                @error('nama_ibu') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rekomendasi">Rekomendasi</label>
                            <input type="text" class="form-control @error('rekomendasi') is-invalid @enderror id=" rekomendasi" placeholder="Contoh: Rekomendasi dari Tokoh Masyarakat atau Lembaga" name="rekomendasi">
                            @error('rekomendasi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="upload_foto">Upload Pas Foto <small>(File Format: png, jpg)</small></label>
                                <input type="file" class="form-control @error('upload_foto') is-invalid @enderror id=" upload_foto" name="upload_foto">
                                @error('upload_foto') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="upload_surat_izin_ortu">Upload Surat Izin Orang Tua <small>(File Format: pdf)</small></label>
                                <input type="file" class="form-control @error('upload_surat_izin_ortu') is-invalid @enderror id=" upload_surat_izin_ortu" name="upload_surat_izin_ortu">
                                @error('upload_surat_izin_ortu') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="upload_cv">Upload Curriculum Vitae (CV) <small>(File Format: pdf)</small></label>
                                <input type="file" class="form-control @error('upload_cv') is-invalid @enderror id=" upload_cv" name="upload_cv">
                                @error('upload_cv') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="upload_ijazah">Upload File Ijazah/Akte Kelahiran <small>(File Format: pdf)</small></label>
                                <input type="file" class="form-control @error('upload_ijazah') is-invalid @enderror id=" upload_ijazah" name="upload_ijazah">
                                @error('upload_ijazah') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="upload_raport">Upload File Raport <small>(File Format: pdf)</small></label>
                                <input type="file" class="form-control @error('upload_raport') is-invalid @enderror id=" upload_raport" name="upload_raport">
                                @error('upload_raport') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="upload_rekomendasi">Upload File Surat Rekomendasi <small>(File Format: pdf)</small></label>
                                <input type="file" class="form-control @error('upload_rekomendasi') is-invalid @enderror id=" upload_rekomendasi" name="upload_rekomendasi">
                                @error('upload_rekomendasi') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Daftar</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

@endsection
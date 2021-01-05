<div class="card-header">
    <h3 class="card-title">Formulir {{ $jalur_aktif->nama }} Tahun {{ $jalur_aktif->tahun }}</h3>
</div>
<div class="card-body">
    <h3 class="card-title">Silakan Isi FORMULIR dengan Lengkap & Data yang Benar</h3>
    @if(Session::has('errors'))
    <div class="alert alert-danger">
        {{Session::get('errors')}}
    </div>
    @endif

    <p class="card-text">
        <ol>
            <li>Mulai segala sesuatu dengan Bismillah.</li>
            <li>Perhatikan penggunaan huruf besar dan kecil. Jangan menjawab dengan huruf capital semua guna memudahkan kami dalam merekap data</li>
        </ol>
    </p>

    <form wire:submit.prevent="savePendaftar">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="text" class="form-control" id="inputEmail" placeholder="Masukkan Email Anda" wire:model="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="inputName">Nama Lengkap <small>(Sesuai Ijazah/KTP)</small></label>
                <input type="text" class="form-control" id="inputName" placeholder="Masukkan Nama Lengkap" wire:model="nama">
                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputName">Utusan Pendaftar</label>
                <input type="text" class="form-control" id="inputName" placeholder="Utusan Pendaftar" wire:model="jenis_pendaftar">
                @error('jenis_pendaftar') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="inputName">No HP/Telp <small>(Yang dapat dihubungi)</small></label>
                <input type="number" class="form-control" id="inputName" placeholder="Masukan No Hp/Telepon yang dapat dihubungi" wire:model="no_hp">
                @error('no_hp') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputName">Tempat Lahir</label>
                <input type="text" class="form-control" id="inputName" placeholder="Masukkan Tempat Lahir" wire:model="tempat_lahir">
                @error('tempat_lahir') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="inputName">Tanggal Lahir</label>
                <input type="text" class="form-control" id="inputName" placeholder="Masukkan Tanggal Lahir" wire:model="tanggal_lahir">
                @error('tanggal_lahir') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="inputName">Alamat Lengkap</label>
            <input type="text" class="form-control" id="inputName" placeholder="Masukkan Alamat Lengkap" wire:model="alamat">
            @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputName">Asal Sekolah/Ma'had</label>
                <input type="text" class="form-control" id="inputName" placeholder="Masukkan Asal Sekolah/Ma'had" wire:model="asal_sekolah">
                @error('asal_sekolah') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="inputName">Alamat Asal Sekolah/Ma'had</label>
                <input type="text" class="form-control" id="inputName" placeholder="Masukkan Alamat Asal Sekolah/Ma'had" wire:model="alamat_sekolah">
                @error('alamat_sekolah') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputName">Nama Ayah</label>
                <input type="text" class="form-control" id="inputName" placeholder="Masukkan Nama Ayah" wire:model="nama_ayah">
                @error('nama_ayah') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="inputName">Nama Ibu</label>
                <input type="text" class="form-control" id="inputName" placeholder="Masukkan Nama Ibu" wire:model="nama_ibu">
                @error('nama_ibu') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="inputName">Rekomendasi</label>
            <input type="text" class="form-control" id="inputName" placeholder="Contoh: Rekomendasi dari Tokoh Masyarakat atau Lembaga" wire:model="rekomendasi">
            @error('rekomendasi') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputName">Upload Pas Foto <small>(File Format: png, jpg)</small></label>
                <input type="file" class="form-control" id="inputName" wire:model="upload_foto">
                @error('upload_foto') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="inputName">Upload Surat Izin Orang Tua <small>(File Format: pdf)</small></label>
                <input type="file" class="form-control" id="inputName" wire:model="upload_surat_izin_ortu">
                @error('upload_surat_izin_ortu') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputName">Upload Curriculum Vitae (CV) <small>(File Format: pdf)</small></label>
                <input type="file" class="form-control" id="inputName" wire:model="upload_cv">
                @error('upload_cv') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="inputName">Upload File Ijazah <small>(File Format: pdf)</small></label>
                <input type="file" class="form-control" id="inputName" wire:model="upload_ijazah">
                @error('upload_ijazah') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>


        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputName">Upload File Raport <small>(File Format: pdf)</small></label>
                <input type="file" class="form-control" id="inputName" wire:model="upload_raport">
                @error('upload_raport') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="inputName">Upload File Surat Rekomendasi <small>(File Format: pdf)</small></label>
                <input type="file" class="form-control" id="inputName" wire:model="upload_rekomendasi">
                @error('upload_rekomendasi') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success">Daftar</button>
    </form>
</div>
<!-- /.card-body -->
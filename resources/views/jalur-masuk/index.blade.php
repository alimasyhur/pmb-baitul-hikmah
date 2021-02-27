@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Manajemen Periode PMB</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <a class="btn btn-sm bg-blue" href="{{ route('jalur-masuk.create') }}">Tambah</a>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Tahun</th>
                                        <th>Deskripsi</th>
                                        <th>Biaya Pendaftaran</th>
                                        <th>Periode Buka</th>
                                        <th>Periode Tutup</th>
                                        <th>Status Aktif</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($jalurMasuk as $idx => $jalur)
                                    <tr>
                                        <td>{{ ++$idx }}</td>
                                        <td>{{ $jalur->nama }}</td>
                                        <td>{{ $jalur->tahun }}</td>
                                        <td>{!! $jalur->keterangan !!}</td>
                                        <td>{{ $jalur->biaya_pendaftaran }}</td>
                                        <td>{{ $jalur->periode_buka }}</td>
                                        <td>{{ $jalur->periode_tutup }}</td>
                                        <td>@if($jalur->is_aktif) Ya @else Tidak @endif</td>
                                        <td>
                                            <a href="{{ route('pendaftar.seleksi', $jalur->id) }}" class="btn btn-block btn-outline-success btn-xs">seleksi</a>
                                            <a href="{{ route('jalur-masuk.edit', $jalur->id) }}" class="btn btn-block btn-outline-primary btn-xs">edit</a>
                                            <form action="{{ route('jalur-masuk.delete', $jalur->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-block btn-outline-danger btn-xs" type="submit">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Seleksi Pendaftar {{ $jalurAktif->nama }} {{ $jalurAktif->tahun }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>No. Pendaftaran</th>
                                        <th>Email</th>
                                        <th>Nama</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status Cetak Kartu</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($model as $idx => $pendaftar)
                                    <tr>
                                        <td>{{ ++$idx }}</td>
                                        <td>{{ $pendaftar->no_pendaftaran }}</td>
                                        <td>{{ $pendaftar->email }}</td>
                                        <td>{{ $pendaftar->nama }}</td>
                                        <td>
                                            @if($pendaftar->is_bayar == 0)
                                            <span class="btn btn-block btn-warning btn-xs">belum bayar</span>
                                            @elseif($pendaftar->is_bayar == 1)
                                            <a class="btn btn-block btn-default btn-xs" href="{{ route('pendaftar.verifikasi-pembayaran', $pendaftar->id) }}">sudah bayar. belum diverifikasi</a>
                                            @elseif($pendaftar->is_bayar == 2)
                                            <span class="btn btn-block btn-success btn-xs">sudah bayar. bukti valid</span>
                                            @elseif($pendaftar->is_bayar == 3)
                                            <span class="btn btn-block btn-danger btn-xs">sudah bayar. bukti tidak valid</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($pendaftar->is_cetak_kartu)
                                            <button class="btn btn-block btn-outline-primary btn-xs">Sudah Cetak</button>
                                            @else
                                            <button class="btn btn-block btn-outline-danger btn-xs">Belum Cetak</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('pendaftar.show', $pendaftar->id) }}" class="btn btn-block btn-outline-success btn-xs">detail</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('jalur-masuk.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
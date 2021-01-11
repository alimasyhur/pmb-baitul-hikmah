@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Verifikasi Bukti Pembayaran No. Pendaftaran {{ $model->no_pendaftaran }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th>No. Pendaftaran</th>
                                        <th>Email</th>
                                        <th>Nama</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $model->no_pendaftaran }}</td>
                                        <td>{{ $model->email }}</td>
                                        <td>{{ $model->nama }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <img src="{{ url($filepath) }}" alt="File Pembayaran" rel="lightbox[image]" height="20%" width="20%">
                            <form method="POST" action="{{ route('pendaftar.update-pembayaran', $model->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="is_bayar">Status Pembayaran</label>
                                        <select class="form-control @error('is_bayar') is-invalid @enderror" id="is_bayar" name="is_bayar">
                                            <option value="1">-- Pilih Status Pembayaran --</option>
                                            <option value="2">Bukti Pembayaran Valid</option>
                                            <option value="3">Bukti Pembayaran Tidak Valid</option>
                                        </select>
                                        @error('jenis_pendaftar') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
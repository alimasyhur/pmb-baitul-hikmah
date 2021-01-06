@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ $dataTable->table(['id'], true) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    console.log('ASDF');
</script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}" defer></script>
{!! $dataTable->scripts() !!}
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
@stop

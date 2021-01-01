@extends('layouts.sp')

@section('content')
@livewireStyles
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-success">
                @livewire('pendaftar-form')
            </div>
        </div>
    </div>
</div>
@livewireScripts
@endsection
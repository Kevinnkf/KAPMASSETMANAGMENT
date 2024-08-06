@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="fw-bolder" style="font-size: 32px">Selamat Pagi, {{ $data['nama'] }}</h1>
            <p class="m-0">Selamat bekerja, Semoga hari mu menyenangkan.</p>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
@extends('templating.main')
@section('content')
<div class="card mb-4">
    <div class="card-body">
        @if (Auth::user()->role == 'admin')
            
        <a href="{{ route('listlatihan.create') }}" class="btn btn-primary">Tambah Anggota Latihan</a>
        @endif
        <h5 class="card-title text-center">Data Jumlah Anggota Latihan Hari ini tanggal {{ date('d-m-Y') }}</h5>
        <h5 class="card-title text-center">Jumlah : {{ $jumlahAnggotaHariIni }} </h5>
        <p class="text-center"><a href="{{ route('anggota_yangikutlatihan') }}" class="btn btn-primary">Lihat Anggota Latihan</a></p>


    </div>
</div>
@endsection
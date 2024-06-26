@extends('templating.main')
@section('content')
<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route('listlatihan') }}" class="btn btn-danger mb-3">Kembali</a>
<form action="{{ route('listlatihan.store') }}" method="post">
    @csrf
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>No</th>
                <th>Pilih</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Fakultas</th>
                <th>Jurusan</th>
                <th>jenis_kelamin</th>
                <th>Jabatan</th>
                <th>Email</th>
             
                {{-- <th>aksi</th> --}}
            </tr>
        </thead>
       
        <tbody>
            @php
             $i=1;   
            @endphp
            @foreach ($anggota as $item)
                
           
            <tr>
                <td>{{ $i++ }}</td>
                <td>
                    <!-- Checkbox dengan name sebagai id anggota -->
                    <input type="checkbox" name="anggota_ids[]" value="{{ $item->id }}">
                </td>
                <td>{{ $item->Nama }}</td>
                <td>{{ $item->Nim }}</td>
                <td>{{ $item->jurusan->fakultas->nama_fakultas }}</td>
                <td>{{ $item->jurusan->nama_jurusan }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->kedudukan }}</td>
                <td>{{ $item->user->email }}</td>
                {{-- <td><button class="btn btn-danger" onclick="hapus({{ $item->id }})">hapus</button>|<a href="{{ route('anggota.edit', $item->id) }}" class="btn btn-warning">Edit</a></td> --}}
             
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary mt-3">Simpan ke List Latihan</button>
</form>
    </div>
</div>
@endsection
@extends('templating.main')
@section('content')
<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route('listlatihan') }}" class="btn btn-danger mb-3">Kembali</a>
{{-- <form action="{{ route('listlatihan.store') }}" method="post">
    @csrf --}}
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>No</th>
                {{-- <th>Pilih</th> --}}
                <th>Nama</th>
                <th>Nim</th>
                <th>Fakultas</th>
                <th>Jurusan</th>
                <th>jenis_kelamin</th>
                <th>Jabatan</th>
                <th>Email</th>
                @if (Auth::user()->role == 'admin')
                    
                <th>aksi</th>
                @endif
             
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
               
                <td>{{ $item->Nama }}</td>
                <td>{{ $item->Nim }}</td>
                <td>{{ $item->jurusan->fakultas->nama_fakultas }}</td>
                <td>{{ $item->jurusan->nama_jurusan }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->kedudukan }}</td>
                <td>{{ $item->user->email }}</td>
                @if (Auth::user()->role == 'admin')
                    
                <td><button class="btn btn-danger" onclick="hapus({{ $item->id }})">Hapus dari list</button></td>
                @endif
                {{-- <td><button class="btn btn-danger" onclick="hapus({{ $item->id }})">hapus</button>|<a href="{{ route('anggota.edit', $item->id) }}" class="btn btn-warning">Edit</a></td> --}}
             
            </tr>
            @endforeach
        </tbody>
    </table>
   
    </div>
</div>
<script>
    function hapus(id){
        Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Apakah Kamu Yakin Ingin Menghapus Anggota dari list latihan?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Batal",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    // console.log(id);
                    window.location.href = `/hapus_listlatihan/${id}`;
                    // window.location.href = "/selesaikan/".itemId "";
                    // Swal.fire({
                    //     title: "Deleted!",
                    //     text: "Your file has been deleted.",
                    //     icon: "success"
                    // });
                }
            });   
    }
</script>
@endsection
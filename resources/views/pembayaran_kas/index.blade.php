@extends('templating.main')
@section('content')
<div class="card mb-4">
    <div class="card-body">
       <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">Tambah pembayaran</a>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Nim</th>
                    <th>nominal kas perbulan</th>
                    <th>Selama</th>
                    <th>tanggal pembayaran</th>
                    <th>dari tanggal</th>
                    <th>sampai tanggal</th>
                    <th>total kas</th>
                    <th>Nominal Bayar</th>
                    <th>Kembalian</th>
                    {{-- <th>aksi</th> --}}
                    {{-- <th>Jabatan</th> --}}
                    @if (Auth::user()->role == 'admin')
                        
                    {{-- <th>Email</th> --}}
                 
                    <th>aksi</th>
                    @endif
                </tr>
            </thead>
           
            <tbody>
                @php
                 $i=1;   
                @endphp
                @foreach ($data as $item)
                    
               
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->anggota->Nama }}</td>
                    <td>{{ $item->anggota->Nim }}</td>
                    <td>{{ number_format($item->nominal) }}</td> 
                    <td>{{ $item->selama }}</td>
                    <td>{{ $item->tanggal_bayar }}</td>
                    <td>{{ $item->dari_tanggal }}</td>
                    <td>{{ $item->sampai_tanggal }}</td>
                    <td>{{ number_format($item->total_nominal) }}</td>
                    <td>{{ number_format($item->bayar) }}</td>
                    <td>{{ number_format($item->bayar - $item->total_nominal) }}</td>
                    @if (Auth::user()->role == 'admin')
                        
                    <td><button class="btn btn-danger" onclick="hapus({{ $item->id }})">Hapus</button>|<a href="{{ route('pembayaran.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                    {{-- <td><button class="btn btn-danger" onclick="hapus({{ $item->id }})">hapus</button>|<a href="{{ route('anggota.edit', $item->id) }}" class="btn btn-warning">Edit</a></td> --}}
                    @endif
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
        function hapus(id) {
            Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Apakah Kamu Yakin Ingin Menghapus Data?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Batal",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    // console.log(id);
                    window.location.href = `/hapus_bayar/${id}`;
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
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1>Masukan Data Anggota</h1>

    <form action="/anggota/store" method="post">
        @csrf
        <input type="text" name="Nama" placeholder="Nama"><br>
        <input type="text" name="Nim" placeholder="Nim"><br>
        <input type="text" name="Fakultas" placeholder="Fakultas"><br>
        <input type="text" name="Jurusan" placeholder="Jurusan"><br>
        <input type="text" name="Angkatan" placeholder="Angkatan"><br>
        <select name="jenis_kelamin" id="">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select><br>
        <input type="submit" name="submit" value="Save">

    </form>
</body>
</html> --}}

@extends('templating.main')
@section('content')
    <div class="card mb-4">
        <div class="card-body">

            <form action="{{ route('pembayaran.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_iuran" value="{{ $iuran->id }}">
                <label for="dari_tanggal" class="form-label">dari tanggal</label>
                <div class="input-group mb-3">

                    <input type="date" class="form-control" id="dari_tanggal" name="dari_tanggal"
                        value="{{ $data->dari_tanggal }}">
                </div>
                <label for="sampa_tanggal" class="form-label">sampai tanggal</label>
                <div class="input-group mb-3">

                    <input type="date" class="form-control" id="sampa_tanggal" name="sampai_tanggal"
                        value="{{ $data->sampai_tanggal }}">
                </div>
                <label for="anggota" class="form-label">Pilih Anggota</label>
                <div class="input-group mb-3">
                    <select class="form-select select2" aria-label="Default select example" id="anggota"
                        name="id_anggota">
                        <option selected>Pilih Anggota</option>
                        @foreach ($anggota as $item)
                            <option value="{{ $item->id }}" @selected($item->id == $data->id_anggota)>Nama : {{ $item->Nama }}, Nim : {{ $item->Nim }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <label for="nominal" class="form-label">Nominal kas perbulan</label>
                <div class="input-group mb-3">

                    <input type="text" class="form-control" id="nominall" name="nominall" value="{{ $iuran->nominal }}"
                        readonly disabled>
                </div>
                <label for="selama" class="form-label">Bayar selama</label>
                <div class="input-group mb-3">

                    <input type="number" class="form-control" id="selama" name="selama" value="{{ $data->selama }}" min="1"   oninput="update_total(this)">
                    <br>
                    <span>bulan</span>
                </div>
                {{-- <div>        <span>bulan</span> </div> --}}
                <input type="hidden" name="nominal" value="{{ $iuran->nominal }}" id="nominal">



                <label for="total_nominall" class="form-label">total kas</label>
                <div class="input-group mb-3">

                    <input type="text" class="form-control" id="total_nominall" name="total_nominall"
                        value="{{ $data->total_nominal }}" readonly>
                </div>
                <input type="hidden" name="total_nominal"  id="total_nominal" value="{{ $data->total_nominal }}">
                <label for="bayar" class="form-label">Bayar</label>
                <div class="input-group mb-3">

                    <input type="text" class="form-control" id="bayar" name="bayar" value="{{ $data->bayar }}"
                    oninput="formatAndCalculateValues(this)">
                </div>
                <label for="kembalian" class="form-label">kembalian</label>
                <div class="input-group mb-3">

                    <input type="text" class="form-control" id="kembalian" name="kembalian"
                        value="{{ $data->bayar - $data->total_nominal }}" readonly>
                </div>






                <button class="btn btn-primary" type="submit">simpan</button>
                <a href="{{ route('pembayaran') }}" class="btn btn-danger">Batal</a>

            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function update_total(input) {
            const qty = input.value;
            const nominal = document.getElementById("nominal").value;
            console.log(nominal);
            document.getElementById("total_nominall").value = (qty * nominal).toLocaleString('id-ID');// to locale String digunakan untuk mengubah angka menjadi format rupiah
            document.getElementById("total_nominal").value = (qty * nominal);// to locale String digunakan untuk mengubah angka menjadi format rupiah
}
function formatAndCalculateValues(input) {
        const totalHarga = parseCurrency(document.getElementById('total_nominall').value);
        
        // Get the value from the bayar field and remove non-numeric characters
        let bayar = parseCurrency(input.value);

        // Calculate kembalian
        const kembalian = bayar - totalHarga;
        
        // Update kembalian field (only if bayar is greater than totalHarga)
        document.getElementById('kembalian').value = formatCurrency(kembalian > 0 ? kembalian : 0);

        // Update bayar field with formatted value
        input.value = formatCurrency(bayar);
    }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2({
                width: '100%', // Mengatur lebar dropdown select sesuai dengan elemen parent
                placeholder: "Pilih Anggota", // Placeholder default
                allowClear: true // Memungkinkan untuk menghapus pilihan
            });
        });



        function formatCurrency(value) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Event listener untuk input #selama
        // $('#selama').on('input', function() {
        //     console.log(document.getElementById('nominal').value);
        //     let selama = $(this).val();
        //     let nominal = $('#nominal').val();

        //     if (!isNaN(selama) && selama > 0) {
        //         // Hitung total kas
        //         let totalNominal = selama * nominal;

        //         // Format hasil perhitungan dengan pemisah ribuan
        //         let formattedTotal = formatCurrency(totalNominal);

        //         // Update input #total_nominal dengan hasil perhitungan yang telah diformat
        //         $('#total_nominal').val(formattedTotal);
        //     } else {
        //         $('#total_nominal').val('');
        //     }
        // });
    </script>
@endsection

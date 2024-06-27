@extends('templating.main')
@section('content')
<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title text-center">KAS</h5>
        <h5 class="card-title text-center">nominal : {{ number_format($kas->nominal) }}</h5>
        <p class="text-center"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="edit({{ $kas }})">
            ubah nominal
          </button></p>


    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ubah nominal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('ubah_nominalkas') }}" method="post">

      @csrf
      <div class="mb-3">
      <label for="nominal" class="form-label">nominal</label>
      <input type="text" class="form-control" id="nominal" name="nominal" oninput="formatCurrency(this)">
    </div>
    <input type="hidden" name="id" id="idd">
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function edit(data) { 
        document.getElementById("idd").value = data.id;
        document.getElementById("nominal").value = data.nominal;
     }
     function formatCurrency(input) {
            // Hapus tanda titik atau koma jika ada
            let valueWithoutCommas = input.value.replace(/[,.]/g, '');

            // Format angka dengan tanda titik sebagai pemisah ribuan
            let formattedValue = new Intl.NumberFormat('id-ID').format(valueWithoutCommas);

            // Tampilkan nilai yang diformat pada input
            input.value = formattedValue;
        }
  </script>
@endsection
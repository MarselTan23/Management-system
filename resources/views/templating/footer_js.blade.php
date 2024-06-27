<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>
<!-- Tambahkan link CSS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Tambahkan jQuery jika belum ada -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Tambahkan link JS Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
      function parseCurrency(value) {
        // Remove any non-digit characters, including commas and periods
        return parseInt(value.replace(/[^0-9]/g, ''), 10) || 0;
    }

    // Function to format numbers as currency
  
</script>
</body>
</html>
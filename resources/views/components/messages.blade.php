<script>
  document.addEventListener('DOMContentLoaded', function() {
    @if(session()->has('success'))
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3000,
      });
    @endif

    @if(session()->has('error'))
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}',
        showConfirmButton: false,
        timer: 3000,
      });
    @endif
  })
</script>
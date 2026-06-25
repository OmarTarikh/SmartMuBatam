<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul</title>

    <!-- Font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap');
    </style>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconify -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
         <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
</head>
<body>

<div class="d-flex">

    @include('components.sidebar')

    <div class="main-content flex-grow-1">

        @include('components.topbar')

        <div class="p-4">
            @yield('content')
        </div>

        @include('components.footer')

    </div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))

        <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("success") }}',
            confirmButtonColor: '#00BF63'
        });
        </script>

        @endif


        @if(session('success_update'))

        <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("success_update") }}',
            confirmButtonColor: '#00BF63'
        });
        </script>

        @endif


        @if(session('success_delete'))

        <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("success_delete") }}',
            confirmButtonColor: '#FF4D4F'
        });
        </script>

    @endif
    
    @stack('scripts')
</body>
</html>
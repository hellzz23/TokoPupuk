<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome & Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Heebo', sans-serif;
        }
        .spinner {
            display: none; /* Nonaktifkan spinner karena butuh JS */
        }
        .back-to-top {
            display: none !important; /* Nonaktifkan tombol kembali */
        }
    </style>
</head>

<body>
    <div class="container-xxl bg-white d-flex p-0">
        
        {{-- Sidebar --}}
        @include('layout.sidebar')

        <!-- Content -->
        <div class="content w-100">
            
            {{-- Navbar --}}
            @include('layout.navbar')

            {{-- Card Ringkasan --}}
            @include('layout.card')

            {{-- Konten Dinamis --}}
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    @yield('content')
                </div>
            </div>

            <!-- Footer -->
            <footer class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Toko Pupuk</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </footer>

        </div> <!-- End Content -->
    </div> <!-- End container -->

    {{-- Tidak ada script JS sama sekali --}}
</body>

</html>
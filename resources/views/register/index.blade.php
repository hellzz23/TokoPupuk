<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sign Up - Toko Pupuk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Heebo', sans-serif;
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 420px;
            margin: auto;
            padding: 2rem;
            margin-top: 5vh;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        .form-container h3 {
            font-weight: 600;
        }

        .form-container .btn {
            font-weight: 500;
        }

        .text-danger {
            font-size: 0.85rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="text-center mb-4">
                <h4 class="text-success"><i class="fa fa-seedling me-2"></i>Toko Pupuk</h4>
                <p class="text-muted mb-0"></p>
            </div>

            {{-- Pesan Sukses --}}
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="floatingName" placeholder="Nama" value="{{ old('name') }}" required>
                    <label for="floatingName">Nama Lengkap</label>
                    @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="floatingEmail" placeholder="email@example.com" value="{{ old('email') }}" required>
                    <label for="floatingEmail">Email</label>
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success py-3 w-100 mb-3">Daftar</button>
<p class="text-center mb-0">Sudah punya akun?<a href="{{ route('login') }}" class="text-primary">Login</a></p>

            </form>
        </div>
    </div>
</body>

</html>
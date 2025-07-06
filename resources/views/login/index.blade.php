<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login - Toko Pupuk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Heebo', sans-serif;
            background-color: #f0f2f5;
        }
        .form-container {
            max-width: 420px;
            margin: auto;
            padding: 2rem;
            margin-top: 5vh;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
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
            <h5 class="text-muted">Selamat Datang Kembali</h5>
        </div>

        {{-- Tampilkan error login --}}
        @if ($errors->has('email'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('email') }}
            </div>
        @endif

        <form action="{{ route('login.proses') }}" method="POST">
            @csrf

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

            <div class="d-flex justify-content-between mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Ingat Saya</label>
                </div>
                <a href="#" class="text-decoration-none text-primary">Lupa Password?</a>
            </div>

            <button type="submit" class="btn btn-success py-3 w-100 mb-3">Login</button>

            <p class="text-center mb-0">Belum punya akun? <a href="{{ route('register') }}" class="text-primary">Daftar di sini</a></p>
        </form>
    </div>
</div>
</body>
</html>
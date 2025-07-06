@extends('layout.template')

@section('title', 'Dashboard - Toko Pupuk')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-success">🌱 Selamat Datang di Toko Pupuk Tani Jaya</h1>
        <p class="lead text-muted">Solusi Pertanian Modern dan Berkelanjutan</p>
    </div>

    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{ asset('assets/img/petani.png') }}"
                class="img-fluid rounded shadow-sm"
                alt="Petani dan Pupuk"
                style="max-height: 350px; object-fit: cover;">
        </div>
        <div class="col-md-6">
            <div class="p-4 bg-light rounded-4 shadow-sm">
                <h3 class="fw-bold text-success">🌿 Kenapa Memilih Kami?</h3>
                <p class="fs-5 text-muted">
                    Kami menyediakan berbagai jenis pupuk berkualitas tinggi untuk mendukung pertanian Anda. 
                    Belanja online jadi mudah, cepat, dan terpercaya.
                </p>
                <ul class="list-unstyled fs-5">
                    <li>✅ Pupuk Organik & Non-Organik</li>
                    <li>✅ Harga Terjangkau</li>
                    <li>✅ Pengiriman Cepat</li>
                    <li>✅ Dukungan Pelanggan Ramah</li>
                </ul>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <div class="text-center">
        <h4 class="fw-bold text-success">Siap Belanja Sekarang? 🌾</h4>
        <p class="fs-5 text-muted">Lihat daftar produk kami dan pesan pupuk yang Anda butuhkan.</p>
        <a href="{{ route('pupuk.index') }}" class="btn btn-lg btn-success px-4 shadow-sm">
            Lihat Daftar Pupuk
        </a>
    </div>
</div>
@endsection
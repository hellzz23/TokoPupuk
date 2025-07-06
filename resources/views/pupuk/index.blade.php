@extends('layout.template')

@section('title', 'Daftar Pupuk - Toko Pupuk')

@section('content')
<div class="container py-5">
    <h2 class="text-success fw-bold text-center mb-5">Daftar Produk Pupuk</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        @foreach ($pupuk as $item)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset($item->foto) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item->nama }}</h5>
                        <p class="card-text">{{ $item->deskripsi }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 text-center pb-3">
                        <a href="{{ route('pesanan.create', $item->id) }}" class="btn btn-sm btn-outline-success">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
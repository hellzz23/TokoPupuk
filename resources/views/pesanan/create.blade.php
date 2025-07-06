@extends('layout.template')

@section('title', 'Form Pesanan')

@section('content')
<div class="container py-5">
    <h2 class="text-success mb-4">Form Pemesanan Pupuk</h2>

    <form action="{{ route('pesanan.store', $pupuk->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pemesan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ponsel" class="form-label">No. HP</label>
            <input type="text" name="ponsel" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="1" min="1" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pupuk yang dipesan</label>
            <input type="text" class="form-control" value="{{ $pupuk->nama }}" disabled>
        </div>

        <button type="submit" class="btn btn-success">Kirim Pesanan</button>
        <a href="{{ route('pupuk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
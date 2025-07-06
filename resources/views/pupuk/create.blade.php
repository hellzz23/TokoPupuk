@extends('layout.template')

@section('title', 'Tambah Pupuk')

@section('content')
<div class="container py-5">
    <h2 class="text-success mb-4">Tambah Data Pupuk</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pupuk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pupuk</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select name="jenis" class="form-control" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="organik">Organik</option>
                <option value="kimia">Kimia</option>
                <option value="campuran">Campuran</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
        </div>
        <form action="{{ route('pupuk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- ... input lainnya --}}
    <div class="mb-3">
        <label for="foto" class="form-label">Upload Foto</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>

    </form>
</div>
@endsection
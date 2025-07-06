@extends('layout.template')

@section('title', 'Edit Pupuk')

@section('content')
<div class="container py-5">
    <h2 class="text-success fw-bold mb-4">Edit Data Pupuk</h2>

    <form action="{{ route('pupuk.update', $pupuk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ $pupuk->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select name="jenis" class="form-control" required>
                <option value="organik" {{ $pupuk->jenis == 'organik' ? 'selected' : '' }}>Organik</option>
                <option value="kimia" {{ $pupuk->jenis == 'kimia' ? 'selected' : '' }}>Kimia</option>
                <option value="campuran" {{ $pupuk->jenis == 'campuran' ? 'selected' : '' }}>Campuran</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" value="{{ $pupuk->stok }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" value="{{ $pupuk->harga }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ $pupuk->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto (kosongkan jika tidak diubah)</label><br>
            <img src="{{ asset('assets/img/' . $pupuk->foto) }}" width="100" class="mb-2"><br>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pupuk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@extends('layout.template')

@section('title', 'Kelola Pupuk - Admin')

@section('content')
<div class="container py-5">
    <h2 class="text-success fw-bold mb-4">Kelola Daftar Pupuk</h2>

    <a href="{{ route('pupuk.create') }}" class="btn btn-success mb-3">+ Tambah Pupuk</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pupuk as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jenis }}</td>
                <td>Rp {{ number_format($item->harga) }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <img src="{{ asset('assets/img/' . $item->foto) }}" width="60" alt="Foto Pupuk">
                </td>
                <td>
                    <a href="{{ route('pupuk.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pupuk.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus pupuk ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layout.template')

@section('title', 'Data Pesanan - Admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-success">Data Pesanan Seluruh Pembeli</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Pupuk</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Tanggal Pesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($semuaPesanan as $index => $pesanan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pesanan->nama }}</td>
                        <td>{{ $pesanan->pupuk->nama ?? '-' }}</td>
                        <td>{{ $pesanan->jumlah }}</td>
                        <td>Rp{{ number_format($pesanan->total, 0, ',', '.') }}</td>
                       <td>{{ date('d M Y', strtotime($pesanan->tgl_pesan)) }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('layout.template')

@section('title', 'Riwayat Pesanan')

@section('content')
<div class="container py-5">
    <h2 class="text-success mb-4">Riwayat Pesanan Saya</h2>

    @if($pesanan->isEmpty())
        <p>Belum ada pesanan.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Pupuk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal Pesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->pupuk->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tgl_pesan)->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
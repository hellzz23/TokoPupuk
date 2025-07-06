<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pupuk;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    // Tampilkan form pemesanan
    public function create($id)
    {
        $pupuk = Pupuk::findOrFail($id);
        return view('pesanan.create', compact('pupuk'));
    }

    // Simpan pesanan ke database
    public function store(Request $request, $id)
    {
        $pupuk = Pupuk::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'ponsel' => 'required',
            'alamat' => 'required',
            'jumlah' => 'required|numeric|min:1',
        ]);

        Pesanan::create([
            'user_id'   => Auth::id(),
            'pupuk_id'  => $pupuk->id,
            'nama'      => $request->nama,
            'ponsel'    => $request->ponsel,
            'alamat'    => $request->alamat,
            'jumlah'    => $request->jumlah,
            'tgl_pesan' => now(),
            'total'     => $pupuk->harga * $request->jumlah,
        ]);

        return redirect()->route('pupuk.index')->with('success', 'Pupuk berhasil dipesan!');
    }

    // Tampilkan riwayat pesanan pengguna
    public function riwayat()
    {
        $pesanan = Pesanan::with('pupuk')
                    ->where('user_id', Auth::id())
                    ->orderBy('tgl_pesan', 'desc')
                    ->get();

        return view('pesanan.riwayat', compact('pesanan'));
    }
    public function admin()
{
    $semuaPesanan = \App\Models\Pesanan::with('pupuk', 'user')->latest()->get();
    return view('pesanan.admin_index', compact('semuaPesanan'));
}

}
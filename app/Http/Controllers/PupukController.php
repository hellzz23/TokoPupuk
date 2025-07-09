<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pupuk;

class PupukController extends Controller
{
    public function index(Request $request)
    {
        $query = Pupuk::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $pupuk = $query->get();

        if (auth()->user()->role === 'admin') {
            return view('pupuk.admin_index', compact('pupuk'));
        } else {
            return view('pupuk.pengunjung_index', compact('pupuk'));
        }
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak.');
        }

        return view('pupuk.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak.');
        }

        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $file->getClientOriginalName());
            $file->move(public_path('assets/img'), $namaFile);
            $data['foto'] = $namaFile;
        } else {
            $data['foto'] = 'default.jpg';
        }

        $data['user_id'] = auth()->id();
        Pupuk::create($data);

        return redirect()->route('pupuk.index')->with('success', 'Pupuk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak.');
        }

        $pupuk = Pupuk::findOrFail($id);
        return view('pupuk.edit', compact('pupuk'));
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak.');
        }

        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pupuk = Pupuk::findOrFail($id);
        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($pupuk->foto && file_exists(public_path('assets/img/' . $pupuk->foto))) {
                unlink(public_path('assets/img/' . $pupuk->foto));
            }

            $file = $request->file('foto');
            $namaFile = time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $file->getClientOriginalName());
            $file->move(public_path('assets/img'), $namaFile);
            $data['foto'] = $namaFile;
        }

        $pupuk->update($data);

        return redirect()->route('pupuk.index')->with('success', 'Data pupuk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak.');
        }

        $pupuk = Pupuk::findOrFail($id);

        if ($pupuk->foto && file_exists(public_path('assets/img/' . $pupuk->foto))) {
            unlink(public_path('assets/img/' . $pupuk->foto));
        }

        $pupuk->delete();

        return redirect()->route('pupuk.index')->with('success', 'Pupuk berhasil dihapus.');
    }
}

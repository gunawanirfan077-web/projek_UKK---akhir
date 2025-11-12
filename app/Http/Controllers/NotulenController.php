<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use Illuminate\Http\Request;

class NotulenController extends Controller
{
    // 🔹 Tampilkan daftar notulen (tanpa search)
    public function index()
    {
        $notulen = Notulen::orderBy('id', 'asc')->get();
        return view('admin.notulen.index', compact('notulen'));
    }

    // 🔹 Halaman tambah notulen
    public function create()
    {
        return view('admin.notulen.create');
    }

    // 🔹 Simpan notulen baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'tanggal' => 'required',
            'tempat' => 'required|max:100',
            'pembicara' => 'required|max:100',
            'isi' => 'required',
            'penulis' => 'required|max:64',
        ]);

        Notulen::create($request->all());

        return redirect()->route('notulen.index')->with('success', 'Notulen berhasil ditambahkan!');
    }

    // 🔹 Lihat detail notulen
    public function show($id)
    {
        $notulen = Notulen::findOrFail($id);
        return view('admin.notulen.show', compact('notulen'));
    }

    // 🔹 Halaman edit notulen
    public function edit($id)
    {
        $notulen = Notulen::findOrFail($id);
        return view('admin.notulen.edit', compact('notulen'));
    }

    // 🔹 Update data notulen
    public function update(Request $request, $id)
    {
        $notulen = Notulen::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:100',
            'tanggal' => 'required',
            'tempat' => 'required|max:100',
            'pembicara' => 'required|max:100',
            'isi' => 'required',
            'penulis' => 'required|max:64',
        ]);

        $notulen->update($request->all());

        return redirect()->route('notulen.index')->with('success', 'Notulen berhasil diperbarui!');
    }

    // 🔹 Hapus notulen
    public function destroy($id)
    {
        $notulen = Notulen::findOrFail($id);
        $notulen->delete();

        return redirect()->route('notulen.index')->with('danger', 'Notulen berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluasi;

class EvaluasiController extends Controller
{
    // 🔹 Menampilkan daftar evaluasi
    public function index()
    {
        // Ambil semua data evaluasi, urut berdasarkan ID
        $evaluasis = Evaluasi::orderBy('id', 'asc')->get();
        return view('admin.evaluasi.index', compact('evaluasis'));
    }

    // 🔹 Form tambah evaluasi
    public function create()
    {
        return view('admin.evaluasi.create');
    }

    // 🔹 Simpan data evaluasi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'hasil_evaluasi' => 'required',
            'penanggung_jawab' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required'
        ]);

        Evaluasi::create($request->all());

        return redirect()->route('evaluasi.index')->with('success', 'Data evaluasi berhasil ditambahkan!');
    }

    // 🔹 Form edit evaluasi
    public function edit($id)
    {
        $evaluasi = Evaluasi::findOrFail($id);
        return view('admin.evaluasi.edit', compact('evaluasi'));
    }

    // 🔹 Update data evaluasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'hasil_evaluasi' => 'required',
            'penanggung_jawab' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required'
        ]);

        $evaluasi = Evaluasi::findOrFail($id);
        $evaluasi->update($request->all());

        return redirect()->route('evaluasi.index')->with('success', 'Data evaluasi berhasil diperbarui!');
    }

    // 🔹 Hapus evaluasi
    public function destroy($id)
    {
        $evaluasi = Evaluasi::findOrFail($id);
        $evaluasi->delete();

        return redirect()->route('evaluasi.index')->with('danger', 'Data evaluasi berhasil dihapus!');
    }
}

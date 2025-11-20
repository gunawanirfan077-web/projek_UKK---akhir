<?php

namespace App\Http\Controllers;

use App\Models\DataAnggota;
use Illuminate\Http\Request;

class DataAnggotaController extends Controller
{
    // 🔹 Halaman daftar anggota
    public function index()
    {
        $data = DataAnggota::orderBy('id', 'asc')->get();
        return view('admin.data_anggota.index', compact('data'));
    }

    // 🔹 Halaman tambah anggota
    public function create()
    {
        return view('admin.data_anggota.create');
    }

    // 🔹 Simpan anggota baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_anggota' => 'required|unique:data_anggota,kode_anggota|max:8',
            'nama' => 'required|max:64',
            'jabatan' => 'required|max:50',
            'no_hp' => 'nullable|max:15',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto ke public/img
        if ($request->hasFile('foto')) {

            $filename = time() . '.' . $request->foto->extension();

            // Pindahkan file ke public/img
            $request->foto->move(public_path('img'), $filename);

            // simpan nama file saja
            $validated['foto'] = $filename;
        }

        DataAnggota::create($validated);

        return redirect()->route('data_anggota.index')->with('success', 'Data anggota berhasil ditambahkan!');
    }

    // 🔹 Halaman edit anggota
    public function edit($id)
    {
        $anggota = DataAnggota::findOrFail($id);
        return view('admin.data_anggota.edit', compact('anggota'));
    }

    // 🔹 Update anggota
    public function update(Request $request, $id)
    {
        $anggota = DataAnggota::findOrFail($id);

        $validated = $request->validate([
            'kode_anggota' => 'required|max:8|unique:data_anggota,kode_anggota,' . $anggota->id,
            'nama' => 'required|max:64',
            'jabatan' => 'required|max:50',
            'no_hp' => 'nullable|max:15',
            'foto' => 'nullable|image|max:2048',
        ]);

        // Jika ada upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($anggota->foto && file_exists(public_path('img/' . $anggota->foto))) {
                unlink(public_path('img/' . $anggota->foto));
            }

            // Upload foto baru
            $filename = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img'), $filename);

            $validated['foto'] = $filename;
        }

        $anggota->update($validated);

        return redirect()->route('data_anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    // 🔹 Hapus anggota
    public function destroy($id)
    {
        $anggota = DataAnggota::findOrFail($id);

        // Hapus file foto
        if ($anggota->foto && file_exists(public_path('img/' . $anggota->foto))) {
            unlink(public_path('img/' . $anggota->foto));
        }

        $anggota->delete();

        return redirect()->route('data_anggota.index')->with('danger', 'Data anggota berhasil dihapus!');
    }
}

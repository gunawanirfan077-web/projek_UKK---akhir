<?php

namespace App\Http\Controllers;

use App\Models\DataAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataAnggotaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search') && $request->search != '') {
            $data = DataAnggota::where('nama', 'LIKE', $request->search . '%')
                ->orderBy('id', 'asc')
                ->get();
        } else {
            $data = DataAnggota::orderBy('id', 'asc')->get();
        }

        return view('admin.data_anggota.index', compact('data'));
    }

    public function create()
    {
        return view('admin.data_anggota.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_anggota' => 'required|unique:data_anggota,kode_anggota|max:8',
            'nama' => 'required|max:64',
            'jabatan' => 'required|max:50',
            'no_hp' => 'nullable|max:15',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('img', 'public');
            $validated['foto'] = $fotoPath;
        }

        DataAnggota::create($validated);

        return redirect()->route('data_anggota.index')->with('success', 'Data anggota berhasil ditambahkan!');
    }

    public function show($id)
    {
        $anggota = DataAnggota::findOrFail($id);
        return view('admin.data_anggota.show', compact('anggota'));
    }

    public function edit($id)
    {
        $anggota = DataAnggota::findOrFail($id);
        return view('admin.data_anggota.edit', compact('anggota'));
    }

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

        if ($request->hasFile('foto')) {
            if ($anggota->foto && Storage::disk('public')->exists($anggota->foto)) {
                Storage::disk('public')->delete($anggota->foto);
            }
            $fotoPath = $request->file('foto')->store('img', 'public');
            $validated['foto'] = $fotoPath;
        }

        $anggota->update($validated);

        return redirect()->route('data_anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $anggota = DataAnggota::findOrFail($id);

        if ($anggota->foto && Storage::disk('public')->exists($anggota->foto)) {
            Storage::disk('public')->delete($anggota->foto);
        }

        $anggota->delete();

        return redirect()->route('data_anggota.index')->with('danger', 'Data anggota berhasil dihapus!');
    }
}

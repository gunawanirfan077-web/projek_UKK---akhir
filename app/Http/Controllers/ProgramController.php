<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    // 🔹 Tampilkan semua program kerja
    public function index()
    {
        $programs = Program::orderBy('id', 'asc')->get(); // Ambil semua data tanpa search
        return view('admin.program.index', compact('programs'));
    }

    // 🔹 Halaman tambah program kerja
    public function create()
    {
        return view('admin.program.create');
    }

    // 🔹 Simpan program kerja baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:perencanaan,berjalan,selesai',
        ]);

        Program::create($request->all());

        return redirect()->route('program.index')->with('success', 'Program kerja berhasil ditambahkan!');
    }

    // 🔹 Halaman edit program kerja
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.edit', compact('program'));
    }

    // 🔹 Update data program kerja
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_program' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:perencanaan,berjalan,selesai',
        ]);

        $program = Program::findOrFail($id);
        $program->update($request->all());

        return redirect()->route('program.index')->with('success', 'Program kerja berhasil diperbarui!');
    }

    // 🔹 Hapus program kerja
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('program.index')->with('danger', 'Program kerja berhasil dihapus!');
    }
}

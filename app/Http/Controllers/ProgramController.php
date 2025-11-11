<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    // Tampilkan semua program kerja
    public function index(Request $request)
    {
        // 🔍 Search by nama_program (huruf depan)
        if ($request->has('search') && $request->search != '') {
            $programs = \App\Models\Program::where('nama_program', 'LIKE', $request->search . '%')
                ->orderBy('id', 'asc')
                ->get();
        } else {
            $programs = \App\Models\Program::orderBy('id', 'asc')->get();
        }

        return view('admin.program.index', compact('programs'));
    }


    // Halaman tambah program kerja
    public function create()
    {
        return view('admin.program.create');
    }

    // Simpan program kerja baru
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

    public function show($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.show', compact('program'));
    }


    // Halaman edit
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.edit', compact('program'));
    }

    // Update data
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

    // Hapus data
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('program.index')->with('danger', 'Program kerja berhasil dihapus!');
    }
}

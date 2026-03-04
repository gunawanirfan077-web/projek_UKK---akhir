<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('id', 'asc')->get(); 
        return view('admin.program.index', compact('programs'));
    }

    public function show($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.show', compact('program'));
    }

    public function create()
    {
        return view('admin.program.create');
    }

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

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.edit', compact('program'));
    }

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

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('program.index')->with('danger', 'Program kerja berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;

class AdminController extends Controller
{
    public function rapat()
    {
        $rapat = Rapat::orderBy('tanggal', 'asc')->get();
        return view('admin.rapat.index', compact('rapat'));
    }

    public function createRapat()
    {
        return view('admin.rapat.create');
    }

    public function storeRapat(Request $request)
    {
        $request->validate([
            'nama_rapat' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:100',
            'status' => 'required|in:belum,selesai',
        ]);

        Rapat::create($request->all());

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil ditambahkan!');
    }

    public function editRapat($id)
    {
        $rapat = Rapat::findOrFail($id);
        return view('admin.rapat.edit', compact('rapat'));
    }

    public function updateRapat(Request $request, $id)
    {
        $request->validate([
            'nama_rapat' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:100',
            'status' => 'required|in:belum,selesai',
        ]);

        $rapat = Rapat::findOrFail($id);
        $rapat->update($request->all());

        return redirect()->route('rapat.index')->with('success', 'Data rapat berhasil diperbarui!');
    }

    public function destroyRapat($id)
    {
        $rapat = Rapat::findOrFail($id);
        $rapat->delete();

        return redirect()->route('rapat.index')->with('danger', 'Rapat berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use Illuminate\Http\Request;

class NotulenController extends Controller
{
    public function index(Request $request)
    {
        // 🔍 Search by judul (huruf depan)
        if ($request->has('search') && $request->search != '') {
            $notulen = \App\Models\Notulen::where('judul', 'LIKE', $request->search . '%')
                ->orderBy('id', 'asc')
                ->get();
        } else {
            $notulen = \App\Models\Notulen::orderBy('id', 'asc')->get();
        }

        return view('admin.notulen.index', compact('notulen'));
    }


    public function create()
    {
        return view('admin.notulen.create');
    }

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

    public function show($id)
    {
        $notulen = Notulen::findOrFail($id);
        return view('admin.notulen.show', compact('notulen'));
    }

    public function edit($id)
    {
        $notulen = Notulen::findOrFail($id);
        return view('admin.notulen.edit', compact('notulen'));
    }

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

    public function destroy($id)
    {
        $notulen = Notulen::findOrFail($id);
        $notulen->delete();
        return redirect()->route('notulen.index')->with('danger', 'Notulen berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DataAnggota;
use App\Models\Rapat;
use App\Models\Program;
use App\Models\Evaluasi;
use App\Models\Notulen; // 🔹 Import model Notulen
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }
    
    // 🔹 Halaman Data Anggota
    public function anggota()
    {
        $data = DataAnggota::all();
        return view('user.anggota', compact('data'));
    }

    // 🔹 Halaman Rapat (User hanya melihat)
    public function rapat()
    {
        $rapat = Rapat::orderBy('tanggal', 'asc')->get();
        return view('user.rapat', compact('rapat'));
    }

    // 🔹 Halaman Program Kerja
    public function program()
    {
        $program = Program::orderBy('created_at', 'asc')->get();
        return view('user.program', compact('program'));
    }

    // 🔹 Halaman Evaluasi Kegiatan (User)
    public function evaluasi()
    {
        $evaluasis = Evaluasi::orderBy('tanggal', 'asc')->get(); // tanpa paginate
        return view('user.evaluasi', compact('evaluasis'));
    }

    // 🔹 Halaman Notulen Kegiatan (User)
    public function notulen()
    {
        $notulen = Notulen::orderBy('tanggal', 'asc')->get(); // urut terbaru
        return view('user.notulen', compact('notulen'));
    }
}

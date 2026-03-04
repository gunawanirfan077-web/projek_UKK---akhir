<?php

namespace App\Http\Controllers;

use App\Models\DataAnggota;
use App\Models\Rapat;
use App\Models\Program;
use App\Models\Evaluasi;
use App\Models\Notulen; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }
    
    public function anggota()
    {
        $data = DataAnggota::all();
        return view('user.anggota', compact('data'));
    }

    public function rapat()
    {
        $rapat = Rapat::orderBy('tanggal', 'asc')->get();
        return view('user.rapat', compact('rapat'));
    }

    public function program()
    {
        $program = Program::orderBy('created_at', 'asc')->get();
        return view('user.program', compact('program'));
    }

    public function evaluasi()
    {
        $evaluasis = Evaluasi::orderBy('tanggal', 'asc')->get();
        return view('user.evaluasi', compact('evaluasis'));
    }

    public function notulen()
    {
        $notulen = Notulen::orderBy('tanggal', 'asc')->get(); 
        return view('user.notulen', compact('notulen'));
    }
}

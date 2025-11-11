<?php

namespace App\Http\Controllers;

use App\Models\DataAnggota;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function anggota()
    {
        $data = DataAnggota::all();
        return view('user.anggota', compact('data'));
    }
}

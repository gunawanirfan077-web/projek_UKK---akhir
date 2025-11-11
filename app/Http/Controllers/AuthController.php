<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private function getUser(): array
    {
        return [
            [
                'username' => 'admin',
                'password' => '$2y$12$hz.yqmQ30IU6EtyEKz2aueBfz7lkwwozXn.SIgt9r1xiYGceRkpDa', // admin123
                'nama' => 'Admin OSIS',
                'email' => 'admin65432@gmail.com',
                'no_hp' => '088765439823',
                'bergabung' => '12 Februari 2024',
                'jabatan' => 'Admin OSIS'
            ],
            [
                'username' => 'user',
                'password' => '$2y$12$VLhgNZkXRQ0apwaWmKK4r.SKl4uv0W515EbpAARu.4Y5x.0XS7m3y', // user123
                'nama' => 'Erfan Gunawan',
                'email' => 'erfangunawan890@gmail.com',
                'no_hp' => '089987654321',
                'bergabung' => '10 Januari 2024',
                'jabatan' => 'Anggota OSIS'
            ]
        ];
    }

    // 🔹 Halaman login
    public function index()
    {
        return view('login');
    }

    // 🔹 Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $auth = $request->only('username', 'password');

        foreach ($this->getUser() as $user) {
            if (
                $user['username'] === $auth['username'] &&
                Hash::check($auth['password'], $user['password'])
            ) {
                Session::put('user', $user);
                return redirect()->route('profil');
            }
        }

        return back()->withErrors(['error' => 'Username atau password salah!']);
    }

    // 🔹 Logout
    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }

    // 🔹 Profil
    public function profil()
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        $user = Session::get('user');
        return view('admin.profil', compact('user'));
    }
}


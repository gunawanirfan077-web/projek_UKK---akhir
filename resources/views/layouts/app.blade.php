<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard Admin')</title>

  <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>


  <!-- Sidebar -->
  <div class="sidebar bg-primary">
    <h2 class="text-white mb-4">Admin Panel</h2>

    <a href="{{ route('profil') }}" class="text-white">👤 Profil</a>
    <a href="{{ route('data_anggota.index') }}" class="text-white">👥 Data Anggota</a>
    <a href="{{ route('rapat.index') }}" class="text-white">🗓️ Kelola Rapat</a>
    <a href="{{ route('program.index') }}" class="text-white">📋 Program Kerja</a>
    <a href="{{ route('evaluasi.index') }}" class="text-white">📊 Evaluasi</a>
    <a href="{{ route('notulen.index') }}" class="text-white">📘 Notulen Kegiatan</a>

    <!-- 🔹 Logout pakai GET sementara (biar tidak error CSRF jika belum ada POST route) -->
    <form action="{{ route('logout') }}" method="GET">
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </div>

  <!-- Konten -->
  <div class="content">

    <!-- 🔹 Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold">🏫 HALAMAN OSIS</a>

        @php
            $user = session('user');
        @endphp

        <div class="d-flex align-items-center">
          <span class="me-2">
            Halo, {{ $user['nama'] ?? 'Tamu' }}
          </span>
          <img src="{{ asset('img/3.jpg') }}" alt="Foto Profil" class="rounded-circle" width="40" height="40">
        </div>
      </div>
    </nav>

    <!-- Isi konten utama -->
    <div class="menu-content mt-4 px-3">
      @yield('content')
    </div>

    <!-- 🔹 Footer -->
    <footer class="text-center py-3 mt-4 border-top">
      <small>© {{ date('Y') }} Organisasi OSIS | SMP N5</small>
    </footer>

  </div>

    <!-- Script Bootstrap Offline -->
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'User OSIS')</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-3" href="#">
        <img src="{{ asset('img/2.jpg') }}" alt="Logo 1" width="50">
        <img src="{{ asset('img/2.png') }}" alt="Logo 2" width="50">
        <span>OSIS SMP N 5 Pekalongan</span>
      </a>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="/user/dashboard">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="/user/anggota">Anggota</a></li>
          <li class="nav-item"><a class="nav-link" href="/user/rapat">Rapat</a></li>
          <li class="nav-item"><a class="nav-link" href="/user/program">Program</a></li>
          <li class="nav-item"><a class="nav-link" href="/user/evaluasi">Evaluasi</a></li>
          <li class="nav-item"><a class="nav-link" href="/user/notulen">Notulen</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Isi Halaman -->
  <main class="flex-grow-1">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-primary text-white text-center py-3 mt-auto">
    <p class="mb-0">&copy; {{ date('Y') }} OSIS SMP Negeri 5 Pekalongan</p>
  </footer>

  <!-- JS -->
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

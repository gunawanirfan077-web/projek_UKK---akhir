<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'User OSIS')</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-3" href="#">
        <img src="{{ asset('img/2.jpg') }}" alt="Logo 1">
        <img src="{{ asset('img/2.png') }}" alt="Logo 2">
        <span>OSIS SMP N 5 Pekalongan</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="/user/dashboard">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="/user/anggota">Anggota</a></li>
          <li class="nav-item"><a class="nav-link" href="/user/program">Rapat</a></li>
          <li class="nav-item"><a class="nav-link" href="/user/program">Program</a></li>
          <li class="nav-item"><a class="nav-link" href="/user/evaluasi">Evaluasi</a></li>
          <li class="nav-item"><a class="nav-link" href="/user/notulen">Notulen</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Isi Halaman -->
  <div class="container mt-4">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer>
    <p class="mb-0">&copy; {{ date('Y') }} OSIS SMP Negeri 5 Pekalongan</p>
  </footer>

  <!-- Bootstrap JS (Offline) -->
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

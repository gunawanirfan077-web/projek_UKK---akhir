<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
  <div class="login-box">
    <img src="{{ asset('img/2.png') }}" alt="Logo Login">
    <h2>Login Admin</h2>

    <!-- 🔹 Gunakan route yang sesuai dengan controller -->
    <form method="POST" action="{{ route('login.process') }}">
      @csrf
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Masuk</button>

      @if ($errors->any())
        <p style="color:red;">{{ $errors->first('error') }}</p>
      @endif

      <p>&copy; 2025 <span class="text-info">OSIS SMP N5 Pekalongan</span></p>
    </form>
  </div>
</body>
</html>


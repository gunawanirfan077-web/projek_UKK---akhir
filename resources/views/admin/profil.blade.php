@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="container mt-5">
  <div class="card shadow-lg border-0 mx-auto" style="width: 900px; height: 400px; border-radius: 20px;">
    <div class="row">

      <div class="col-md-4 text-center bg-info " style="height: 400px; border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
        <img src="{{ asset('img/3.jpg') }}" alt="Foto Profil" class="rounded-circle"
             style="width: 150px; height: 150px; margin-bottom: 5%; margin-top:25%;">

        @php
          $user = session('user');
        @endphp
        
        <h5 class="fw-bold mb-0">{{ $user['nama'] ?? 'Tamu' }}</h5>
        <p class="text-muted mb-0">{{ $user['jabatan'] ?? 'Belum ada jabatan' }}</p>
      </div>

      <div class="col-md-8">
        <div class="card-body px-4" style="margin-top: 10%;">
          <h4 class="fw-bold mb-3">Informasi Pribadi</h4>
          <hr>
          <p><strong>📧 Email:</strong> {{ $user['email'] ?? 'Tidak tersedia' }}</p>
          <p><strong>📞 No. HP:</strong> {{ $user['no_hp'] ?? '-' }}</p>
          <p><strong>📅 Bergabung:</strong> {{ $user['bergabung'] ?? '-' }}</p>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
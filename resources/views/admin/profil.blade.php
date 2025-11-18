@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="container mt-5">
  <div class="card shadow-lg border-0 mx-auto" style="max-width: 900px; border-radius: 20px;">
    <div class="row">

      <!-- 🔹 Foto & Nama -->
      <div class="col-md-4 text-center bg-info p-4" style="border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
        <img src="{{ asset('img/3.jpg') }}" alt="Foto Profil" class="rounded-circle mb-3"
             style="width: 150px; height: 150px;">

        @php
          $user = session('user');
        @endphp
        
        <h5 class="fw-bold mb-0">{{ $user['nama'] ?? 'Tamu' }}</h5>
        <p class="text-muted mb-0">{{ $user['jabatan'] ?? 'Belum ada jabatan' }}</p>
      </div>

      <!-- 🔹 Informasi Pribadi -->
      <div class="col-md-8">
        <div class="card-body px-4 py-5">
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

<!-- 🔹 Statistik (contoh tambahan bawah profil) -->
<div class="row mt-5 g-4 justify-content-center">
  <div class="col-md-2">
    <div class="card shadow border-0 text-center py-3">
      <div class="card-body">
        <h5 class="fw-bold text-primary">👥</h5>
        <p class="text-muted mb-0">Anggota</p>
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <div class="card shadow border-0 text-center py-3">
      <div class="card-body">
        <h5 class="fw-bold text-success">🗓️</h5>
        <p class="text-muted mb-0">Rapat</p>
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <div class="card shadow border-0 text-center py-3">
      <div class="card-body">
        <h5 class="fw-bold text-warning">📋</h5>
        <p class="text-muted mb-0">Program</p>
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <div class="card shadow border-0 text-center py-3">
      <div class="card-body">
        <h5 class="fw-bold text-info">📊</h5>
        <p class="text-muted mb-0">Evaluasi</p>
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <div class="card shadow border-0 text-center py-3">
      <div class="card-body">
        <h5 class="fw-bold text-danger">📘</h5>
        <p class="text-muted mb-0">Notulen</p>
      </div>
    </div>
  </div>
</div>
@endsection

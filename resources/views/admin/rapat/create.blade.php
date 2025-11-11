@extends('layouts.app')

@section('title', 'Tambah Rapat')

@section('content')
<div class="container mt-5">
  
  <!-- Header -->
  <div class="text-center mb-4">
    <h2 class="fw-bold text-primary">Tambah Rapat Baru</h2>
    <p class="text-muted">Isi form di bawah untuk menambahkan rapat OSIS baru</p>
  </div>

  <!-- Card Form -->
  <div class="card shadow-lg border-0 mx-auto" style="max-width: 700px; border-radius: 15px;">
    <div class="card-body p-5">

      <form action="{{ route('rapat.store') }}" method="POST">
        @csrf

        <!-- Nama Rapat -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Rapat</label>
          <input type="text" name="nama_rapat" class="form-control form-control-lg"  required>
        </div>

        <!-- Tanggal -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Tanggal</label>
          <input type="date" name="tanggal" class="form-control form-control-lg" required>
        </div>

        <!-- Tempat -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Tempat</label>
          <input type="text" name="tempat" class="form-control form-control-lg"  required>
        </div>

        <!-- Status -->
        <div class="mb-4">
          <label class="form-label fw-semibold">Status</label>
          <select name="status" class="form-select form-select-lg">
            <option value="belum">Belum</option>
            <option value="selesai">Selesai</option>
          </select>
        </div>

        <!-- Tombol Aksi -->
        <div class="text-end">
        <a href="{{ route('rapat.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>

      </form>
    </div>
  </div>

  <!-- 🔹 Tombol ke Detail (muncul setelah menambah data) -->
  @if(session('rapat_id'))
    <div class="text-center mt-4">
      <a href="{{ route('rapat.show', session('rapat_id')) }}" class="btn btn-success rounded-pill px-4">
        <i class="bi bi-eye"></i> Lihat Detail Rapat yang Baru Ditambahkan
      </a>
    </div>
  @endif

</div>
@endsection

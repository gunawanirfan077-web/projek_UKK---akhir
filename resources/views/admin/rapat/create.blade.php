@extends('layouts.app')

@section('title', 'Tambah Rapat')

@section('content')
<div class="container mt-5">
  
  <div class="text-center mb-4">
    <h2 class="fw-bold text-primary">Tambah Rapat Baru</h2>
    <p class="text-muted">Isi form di bawah untuk menambahkan rapat OSIS baru</p>
  </div>

  <div class="card shadow-lg border-0 mx-auto" style="max-width: 700px; border-radius: 15px;">
    <div class="card-body p-5">

      <form action="{{ route('rapat.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Rapat</label>
          <input type="text" name="nama_rapat" class="form-control form-control-lg"  required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Tanggal</label>
          <input type="date" name="tanggal" class="form-control form-control-lg" required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Tempat</label>
          <input type="text" name="tempat" class="form-control form-control-lg"  required>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">Status</label>
          <select name="status" class="form-select form-select-lg">
            <option value="belum">Belum</option>
            <option value="selesai">Selesai</option>
          </select>
        </div>

        <div class="text-end">
          <a href="{{ route('rapat.index') }}" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection

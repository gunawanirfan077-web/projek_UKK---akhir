@extends('layouts.app')

@section('title', 'Tambah Evaluasi')

@section('content')
<div class="container mt-4">
  <div class="card shadow-lg border-0 rounded-4 p-4" style="max-width: 700px; margin:auto;">
    <h3 class="mb-4 text-center">Tambah Evaluasi Kegiatan</h3>

    <form action="{{ route('evaluasi.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Nama Kegiatan</label>
        <input type="text" name="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan') }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Hasil Evaluasi</label>
        <textarea name="hasil_evaluasi" rows="4" class="form-control" required>{{ old('hasil_evaluasi') }}</textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Penanggung Jawab</label>
        <input type="text" name="penanggung_jawab" class="form-control" value="{{ old('penanggung_jawab') }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
          <option value="baik" {{ old('status') == 'baik' ? 'selected' : '' }}>Baik</option>
          <option value="perlu perbaikan" {{ old('status') == 'perlu perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
          <option value="buruk" {{ old('status') == 'buruk' ? 'selected' : '' }}>Buruk</option>
        </select>
      </div>

      <div class="text-end">
        <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection


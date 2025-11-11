@extends('layouts.app')

@section('title', 'Tambah Notulen Kegiatan')

@section('content')
<div class="container mt-4">
  <div class="card shadow border-0 rounded-4">
    <div class="card-body">
      <h3 class="mb-4 text-center">Tambah Notulen Kegiatan</h3>

      <form action="{{ route('notulen.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Judul</label>
          <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal</label>
          <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Tempat</label>
          <input type="text" name="tempat" class="form-control" value="{{ old('tempat') }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Pembicara</label>
          <input type="text" name="pembicara" class="form-control" value="{{ old('pembicara') }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Isi Notulen</label>
          <textarea name="isi" rows="4" class="form-control" required>{{ old('isi') }}</textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Penulis</label>
          <input type="text" name="penulis" class="form-control" value="{{ old('penulis') }}" required>
        </div>

        <div class="text-end">
          <a href="{{ route('notulen.index') }}" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

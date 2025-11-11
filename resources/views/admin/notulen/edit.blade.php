@extends('layouts.app')

@section('title', 'Edit Notulen Kegiatan')

@section('content')
<div class="container mt-4">
  <div class="card shadow border-0 rounded-4">
    <div class="card-body">
      <h3 class="mb-4 text-center">Edit Notulen Kegiatan</h3>

      <form action="{{ route('notulen.update', $notulen->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Judul</label>
          <input type="text" name="judul" class="form-control" value="{{ old('judul', $notulen->judul) }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal</label>
          <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $notulen->tanggal) }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Tempat</label>
          <input type="text" name="tempat" class="form-control" value="{{ old('tempat', $notulen->tempat) }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Pembicara</label>
          <input type="text" name="pembicara" class="form-control" value="{{ old('pembicara', $notulen->pembicara) }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Isi Notulen</label>
          <textarea name="isi" rows="4" class="form-control" required>{{ old('isi', $notulen->isi) }}</textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Penulis</label>
          <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $notulen->penulis) }}" required>
        </div>

        <div class="text-end">
          <a href="{{ route('notulen.index') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Edit Rapat')

@section('content')
<div class="container">
  <h3 class="mb-4">✏️ Edit Data Rapat</h3>

  <form action="{{ route('rapat.update', $rapat->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="nama_rapat" class="form-label">Nama Rapat</label>
      <input type="text" id="nama_rapat" name="nama_rapat" value="{{ old('nama_rapat', $rapat->nama_rapat) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $rapat->tanggal) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="tempat" class="form-label">Tempat</label>
      <input type="text" id="tempat" name="tempat" value="{{ old('tempat', $rapat->tempat) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select id="status" name="status" class="form-select" required>
        <option value="belum" {{ $rapat->status == 'belum' ? 'selected' : '' }}>Belum</option>
        <option value="selesai" {{ $rapat->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
      </select>
    </div>

    <div class="mt-4">
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{ route('rapat.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
@endsection

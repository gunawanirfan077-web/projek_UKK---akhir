@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h3>✏️ Edit Program Kerja</h3>

  <form action="{{ route('program.update', $program->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Nama Program</label>
      <input type="text" name="nama_program" class="form-control" value="{{ $program->nama_program }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="3">{{ $program->deskripsi }}</textarea>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" class="form-control" value="{{ $program->tanggal_mulai }}">
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" class="form-control" value="{{ $program->tanggal_selesai }}">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Status</label>
      <select name="status" class="form-select">
        <option value="perencanaan" {{ $program->status == 'perencanaan' ? 'selected' : '' }}>Perencanaan</option>
        <option value="berjalan" {{ $program->status == 'berjalan' ? 'selected' : '' }}>Berjalan</option>
        <option value="selesai" {{ $program->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('program.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection

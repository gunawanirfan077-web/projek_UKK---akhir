@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
<div class="container mt-4">
  <h3 class="mb-4">➕ Tambah Anggota Baru</h3>

  <form action="{{ route('data_anggota.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="kode_anggota" class="form-label">Kode Anggota</label>
      <input type="text" name="kode_anggota" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="nama" class="form-label">Nama Lengkap</label>
      <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="jabatan" class="form-label">Jabatan</label>
      <input type="text" name="jabatan" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="no_hp" class="form-label">No HP</label>
      <input type="text" name="no_hp" class="form-control">
    </div>

    <div class="mb-3">
      <label for="foto" class="form-label">Foto Anggota</label>
      <input type="file" name="foto" class="form-control">
    </div>

    <div class="text-end">
      <a href="{{ route('data_anggota.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>
@endsection


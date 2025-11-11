@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
<div class="container mt-4">
  <h3 class="mb-4">✏️ Edit Data Anggota</h3>

  <form action="{{ route('data_anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label>Kode Anggota</label>
      <input type="text" name="kode_anggota" class="form-control" value="{{ $anggota->kode_anggota }}" required>
    </div>

    <div class="mb-3">
      <label>Nama Lengkap</label>
      <input type="text" name="nama" class="form-control" value="{{ $anggota->nama }}" required>
    </div>

    <div class="mb-3">
      <label>Jabatan</label>
      <input type="text" name="jabatan" class="form-control" value="{{ $anggota->jabatan }}" required>
    </div>

    <div class="mb-3">
      <label>No HP</label>
      <input type="text" name="no_hp" class="form-control" value="{{ $anggota->no_hp }}">
    </div>

    <div class="mb-3">
      <label>Foto Baru</label>
      <input type="file" name="foto" class="form-control">
      @if ($anggota->foto)
        <img src="{{ asset('storage/' . $anggota->foto) }}" width="100" class="mt-2 rounded">
      @endif
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('data_anggota.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection


@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h3>➕ Tambah Program Kerja</h3>

  <form action="{{ route('program.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label class="form-label">Nama Program</label>
      <input type="text" name="nama_program" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="3"></textarea>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" class="form-control">
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" class="form-control">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Status</label>
      <select name="status" class="form-select">
        <option value="perencanaan">Perencanaan</option>
        <option value="berjalan">Berjalan</option>
        <option value="selesai">Selesai</option>
      </select>
    </div>
    
    <div class="text-end">
       <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{ route('program.index') }}" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Data Anggota')

@section('content')
<div class="container mt-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>👥 Data Anggota</h3>
  </div>

  <div class="d-flex justify-content-end align-items-center mb-4">
    <a href="{{ route('data_anggota.create') }}" class="btn btn-primary me-2">+ Tambah Anggota</a>

    <form action="{{ route('data_anggota.index') }}" method="GET" class="d-flex" role="search">
      <input type="text" name="search" class="form-control me-2" placeholder="Cari nama anggota..." value="{{ request('search') }}">
      <button type="submit" class="btn btn-outline-primary">Cari</button>
      @if(request('search'))
        <a href="{{ route('data_anggota.index') }}" class="btn btn-outline-secondary ms-2">Reset</a>
      @endif
    </form>
  </div>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if (session('danger'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
      {{ session('danger') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <table class="table table-bordered table-hover align-middle text-center mb-0">
    <thead class="table-primary text-dark">
      <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Kode Anggota</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>No HP</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($data as $index => $anggota)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>
            @if ($anggota->foto)
              <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto" width="60" height="60" class="rounded-circle object-fit-cover">
            @else
              <span class="text-muted">Tidak ada</span>
            @endif
          </td>
          <td>{{ $anggota->kode_anggota }}</td>
          <td>{{ $anggota->nama }}</td>
          <td>{{ $anggota->jabatan }}</td>
          <td>{{ $anggota->no_hp ?? '-' }}</td>
          <td>
            <a href="{{ route('data_anggota.show', $anggota->id) }}" class="btn btn-info btn-sm text-white">Lihat</a>
            <a href="{{ route('data_anggota.edit', $anggota->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('data_anggota.destroy', $anggota->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center text-muted">Belum ada data anggota.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection

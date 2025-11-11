@extends('layouts.app')

@section('title', 'Daftar Notulen Kegiatan')

@section('content')
<div class="container mt-4">
  <!-- Judul -->
  <div class="mb-3">
    <h3>📝 Daftar Notulen Kegiatan</h3>
  </div>

  <!-- 🔹 Tombol Tambah & Search -->
  <div class="d-flex justify-content-end align-items-center mb-4">
    <a href="{{ route('notulen.create') }}" class="btn btn-primary me-2">+ Tambah Notulen</a>

    <form action="{{ route('notulen.index') }}" method="GET" class="d-flex" role="search">
      <input 
        type="text" 
        name="search" 
        class="form-control me-2" 
        placeholder="Cari notulen..." 
        value="{{ request('search') }}" 
        autofocus
      >
      <button type="submit" class="btn btn-outline-primary">Cari</button>
      @if(request('search'))
        <a href="{{ route('notulen.index') }}" class="btn btn-outline-secondary ms-2">Reset</a>
      @endif
    </form>
  </div>

  <!-- ✅ Alert -->
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if (session('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <!-- 🔹 Tabel Notulen -->
  <table class="table table-bordered table-hover align-middle text-center mb-0">
      <thead class="table-primary text-dark">
      <tr>
        <th style="width: 5%">No</th>
        <th>Judul</th>
        <th style="width: 12%">Tanggal</th>
        <th>Tempat</th>
        <th>Pembicara</th>
        <th>Penulis</th>
        <th style="width: 15%">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($notulen as $i => $n)
      <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $n->judul }}</td>
        <td>{{ $n->tanggal }}</td>
        <td>{{ $n->tempat }}</td>
        <td>{{ $n->pembicara }}</td>
        <td>{{ $n->penulis }}</td>
        <td class="text-nowrap">
          <a href="{{ route('notulen.show', $n->id) }}" class="btn btn-info btn-sm text-white me-1">Lihat</a>
          <a href="{{ route('notulen.edit', $n->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
          <form action="{{ route('notulen.destroy', $n->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center text-muted">Belum ada data notulen.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection

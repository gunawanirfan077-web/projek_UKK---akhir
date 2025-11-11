@extends('layouts.app')

@section('title', 'Kelola Rapat')

@section('content')
<div class="container mt-4">

  <!-- Judul Halaman -->
  <div class="mb-3">
  <h3>🗓️ Kelola Rapat</h3>
</div>

<div class="d-flex justify-content-end align-items-center mb-4">
  <a href="{{ route('rapat.create') }}" class="btn btn-primary me-2">+ Tambah Rapat</a>
  
  <form action="{{ route('rapat.index') }}" method="GET" class="d-flex" role="search">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari rapat..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-outline-primary">Cari</button>
    @if(request('search'))
      <a href="{{ route('rapat.index') }}" class="btn btn-outline-secondary ms-2">Reset</a>
    @endif
  </form>
</div>


  <!-- Notifikasi -->
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if (session('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('danger') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <!-- Tabel -->
  <div class="card shadow border-0 rounded-4">
    <div class="card-body">
      <table class="table table-bordered table-hover align-middle text-center mb-0">
        <thead class="table-primary text-dark">
          <tr>
            <th style="width: 5%;">No</th>
            <th>Nama Rapat</th>
            <th>Tanggal</th>
            <th>Tempat</th>
            <th>Status</th>
            <th style="width: 25%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($rapat as $i => $r)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td>{{ $r->nama_rapat }}</td>
              <td>{{ \Carbon\Carbon::parse($r->tanggal)->translatedFormat('d F Y') }}</td>
              <td>{{ $r->tempat }}</td>
              <td>
                <span class="badge bg-{{ $r->status == 'selesai' ? 'success' : 'warning' }}">
                  {{ ucfirst($r->status) }}
                </span>
              </td>
              <td>
                <a href="{{ route('rapat.show', $r->id) }}" class="btn btn-info btn-sm me-1">Lihat</a>
                <a href="{{ route('rapat.edit', $r->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                <form action="{{ route('rapat.destroy', $r->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-muted">Belum ada data rapat.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

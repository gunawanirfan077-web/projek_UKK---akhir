@extends('layouts.app')

@section('title', 'Evaluasi Kegiatan')

@section('content')
<div class="container mt-4">
  <div class="mb-3">
    <h3>📊 Daftar Evaluasi Kegiatan</h3>
  </div>

  <!-- 🔹 Tombol Tambah & Search -->
  <div class="d-flex justify-content-end align-items-center mb-4">
    <a href="{{ route('evaluasi.create') }}" class="btn btn-primary me-2">+ Tambah Evaluasi</a>
    
    <form action="{{ route('evaluasi.index') }}" method="GET" class="d-flex" role="search">
      <input type="text" name="search" class="form-control me-2" placeholder="Cari kegiatan..." value="{{ request('search') }}" autofocus>
      <button type="submit" class="btn btn-outline-primary">Cari</button>
      @if(request('search'))
        <a href="{{ route('evaluasi.index') }}" class="btn btn-outline-secondary ms-2">Reset</a>
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

  <table class="table table-bordered table-hover table-sm align-middle text-center mb-0">
    <thead class="table-primary text-dark">
      <tr>
        <th style="width:5%">No</th>
        <th>Nama Kegiatan</th>
        <th class="text-nowrap">Tanggal</th>
        <th>Hasil Evaluasi</th>
        <th>Penanggung Jawab</th>
        <th>Status</th>
        <th style="width:20%">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @if($evaluasis->count() > 0)
        @foreach($evaluasis as $i => $e)
          <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $e->nama_kegiatan }}</td>
            <td class="text-nowrap">{{ $e->tanggal }}</td>
            <td>{{ $e->hasil_evaluasi }}</td>
            <td>{{ $e->penanggung_jawab }}</td>
            <td>
              <span class="badge bg-{{ $e->status == 'baik' ? 'success' : ($e->status == 'perlu perbaikan' ? 'warning' : 'danger') }}">
                {{ ucfirst($e->status) }}
              </span>
            </td>
            <td>
              <a href="{{ route('evaluasi.show', $e->id) }}" class="btn btn-info btn-sm me-1">Lihat</a>
              <a href="{{ route('evaluasi.edit', $e->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
              <form action="{{ route('evaluasi.destroy', $e->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      @else
        <tr>
          <td colspan="7" class="text-center text-muted">Belum ada data evaluasi</td>
        </tr>
      @endif
    </tbody>
  </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <!-- Judul -->
  <div class="mb-3">
    <h3>📋 Daftar Program Kerja</h3>
  </div>

  <!-- 🔹 Tombol Tambah & Search -->
  <div class="d-flex justify-content-end align-items-center mb-4">
    <a href="{{ route('program.create') }}" class="btn btn-primary me-2">+ Tambah Program</a>
    
    <form action="{{ route('program.index') }}" method="GET" class="d-flex" role="search">
      <input 
        type="text" 
        name="search" 
        class="form-control me-2" 
        placeholder="Cari program..." 
        value="{{ request('search') }}" 
        autofocus
      >
      <button type="submit" class="btn btn-outline-primary">Cari</button>
      @if(request('search'))
        <a href="{{ route('program.index') }}" class="btn btn-outline-secondary ms-2">Reset</a>
      @endif
    </form>
  </div>

  <!-- ✅ Alert -->
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

  <!-- 🔹 Tabel Data -->
  <table class="table table-bordered table-hover align-middle text-center mb-0">
      <thead class="table-primary text-dark">
      <tr>
        <th style="width: 5%">No</th>
        <th style="width: 18%">Nama Program</th>
        <th>Deskripsi</th>
        <th style="width: 12%">Mulai</th>
        <th style="width: 12%">Selesai</th>
        <th style="width: 10%">Status</th>
        <th style="width: 12%; text-align:center;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($programs as $i => $p)
      <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $p->nama_program }}</td>
        <td>{{ $p->deskripsi }}</td>
        <td>{{ $p->tanggal_mulai }}</td>
        <td>{{ $p->tanggal_selesai }}</td>
        <td>
          <span class="badge bg-{{ 
            $p->status == 'perencanaan' ? 'primary' : 
            ($p->status == 'berjalan' ? 'warning' : 'success') 
          }}">
              {{ ucfirst($p->status) }}
          </span>
        </td>
        <td class="text-center text-nowrap">
          <a href="{{ route('program.show', $p->id) }}" class="btn btn-info btn-sm text-white me-1">Lihat</a>
          <a href="{{ route('program.edit', $p->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
          <form action="{{ route('program.destroy', $p->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center text-muted">Belum ada data program kerja.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection


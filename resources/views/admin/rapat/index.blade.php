@extends('layouts.app')

@section('title', 'Daftar Rapat')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>📅 Daftar Rapat</h3>
    </div>

    <!-- Tombol Tambah Rapat -->
    <div class="d-flex justify-content-end align-items-center mb-4">
        <a href="{{ route('rapat.create') }}" class="btn btn-primary">+ Tambah Rapat</a>
    </div>

    <!-- Alerts -->
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

    <!-- Tabel Rapat -->
    <table class="table table-bordered table-hover align-middle text-center mb-0">
        <thead class="table-primary text-dark">
            <tr>
                <th>No</th>
                <th>Nama Rapat</th>
                <th>Tanggal</th>
                <th>Tempat</th>
                <th>Status</th>
                <th style="width: 20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rapat as $index => $r)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $r->nama_rapat }}</td>
                    <td>{{ $r->tanggal }}</td>
                    <td>{{ $r->tempat }}</td>
                    <td>
                        <span class="badge bg-{{ $r->status == 'selesai' ? 'success' : 'warning' }}">
                            {{ ucfirst($r->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('rapat.edit', $r->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="{{ route('rapat.destroy', $r->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data rapat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

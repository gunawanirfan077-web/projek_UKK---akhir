@extends('layouts.app')

@section('title', 'Daftar Program Kerja')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>📋 Daftar Program Kerja</h3>
    </div>

    <!-- Tombol Tambah Program -->
    <div class="d-flex justify-content-end align-items-center mb-4">
        <a href="{{ route('program.create') }}" class="btn btn-primary">+ Tambah Program</a>
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

    <!-- Tabel Program -->
    <table class="table table-bordered table-hover align-middle text-center mb-0">
        <thead class="table-primary text-dark">
            <tr>
                <th>No</th>
                <th>Nama Program</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th style="width: 20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($programs as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nama_program }}</td>
                    <td>{{ $p->tanggal_mulai ?? '-' }}</td>
                    <td>{{ $p->tanggal_selesai ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $p->status == 'selesai' ? 'success' : ($p->status == 'berjalan' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('program.show', $p->id) }}" class="btn btn-info btn-sm me-1">Lihat</a>
                        <a href="{{ route('program.edit', $p->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="{{ route('program.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data program kerja.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

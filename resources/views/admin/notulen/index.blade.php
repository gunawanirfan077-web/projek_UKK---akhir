@extends('layouts.app')

@section('title', 'Daftar Notulen')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>📝 Daftar Notulen Kegiatan</h3>
        <a href="{{ route('notulen.create') }}" class="btn btn-primary">+ Tambah Notulen</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-bordered table-hover align-middle text-center mb-0">
        <thead class="table-primary text-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Tempat</th>
                <th>Pembicara</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($notulen as $i => $n)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $n->judul }}</td>
                <td>{{ $n->tanggal }}</td>
                <td>{{ $n->tempat }}</td>
                <td>{{ $n->pembicara }}</td>
                <td>{{ $n->penulis }}</td>
                <td>
                    <a href="{{ route('notulen.show', $n->id) }}" class="btn btn-info btn-sm text-white me-1">Lihat</a>
                    <a href="{{ route('notulen.edit', $n->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="{{ route('notulen.destroy', $n->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
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

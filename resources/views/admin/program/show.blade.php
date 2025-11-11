@extends('layouts.app')

@section('title', 'Detail Program Kerja')

@section('content')
<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">📘 Detail Program Kerja</h4>
    </div>
    <div class="card-body">
      <p><strong>Nama Program:</strong> {{ $program->nama_program }}</p>
      <p><strong>Deskripsi:</strong> {{ $program->deskripsi }}</p>
      <p><strong>Tanggal Mulai:</strong> {{ $program->tanggal_mulai }}</p>
      <p><strong>Tanggal Selesai:</strong> {{ $program->tanggal_selesai }}</p>
      <p><strong>Status:</strong> 
        <span class="badge bg-{{ $program->status == 'perencanaan' ? 'success' : ($program->status == 'berjalan' ? 'warning' : 'danger') }}">
          {{ ucfirst($program->status) }}
        </span>
      </p>
    </div>
    <div class="card-footer text-end">
      <a href="{{ route('program.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </div>
</div>
@endsection

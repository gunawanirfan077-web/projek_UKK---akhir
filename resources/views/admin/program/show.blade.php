@extends('layouts.app')

@section('title', 'Detail Program Kerja')

@section('content')
<div class="container mt-5">
  <div class="card shadow border-0 mx-auto" style="max-width: 700px;">
    
    <!-- Header -->
    <div class="card-header bg-primary text-white text-center">
      <h4 class="mb-0">{{ $program->nama_program }}</h4>
    </div>
    
    <!-- Body -->
    <div class="card-body">
      <p><strong>Tanggal Mulai:</strong> 
        {{ $program->tanggal_mulai ? \Carbon\Carbon::parse($program->tanggal_mulai)->format('d M Y') : '-' }}
      </p>
      <p><strong>Tanggal Selesai:</strong> 
        {{ $program->tanggal_selesai ? \Carbon\Carbon::parse($program->tanggal_selesai)->format('d M Y') : '-' }}
      </p>
      <p><strong>Status:</strong> 
        <span class="badge bg-{{ 
          $program->status == 'selesai' ? 'success' : 
          ($program->status == 'berjalan' ? 'warning' : 'secondary') 
        }}">
          {{ ucfirst($program->status) }}
        </span>
      </p>
      <hr>
      <p><strong>Deskripsi Program:</strong></p>
      <div class="border rounded p-3 bg-light">
        {!! nl2br(e($program->deskripsi ?? 'Tidak ada deskripsi.')) !!}
      </div>
    </div>

    <!-- Footer -->
    <div class="card-footer text-end">
      <a href="{{ route('program.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

  </div>
</div>
@endsection

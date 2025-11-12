@extends('layouts.user')

@section('title', 'Program Kerja OSIS')

@section('content')
<div class="container py-5" style="min-height: 100vh;">
  
  <!-- Card Utama -->
  <div class="card shadow border-0">
    
    <!-- Header -->
    <div class="card-header bg-primary text-white text-center py-3">
      <h4 class="mb-0">📋 Program Kerja OSIS SMP N 5 Pekalongan</h4>
    </div>

    <!-- Isi Card -->
    <div class="card-body" style="background-color: #eaf2ff;">
      <div class="row justify-content-center">
        @forelse ($program as $program)
          <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
              <div class="card-body">
                <h5 class="fw-bold text-primary">{{ $program->nama_program }}</h5>
                <p class="text-muted small mb-2">
                  <strong>Tanggal:</strong> 
                  {{ \Carbon\Carbon::parse($program->tanggal_mulai)->format('d M Y') }} 
                  - 
                  {{ \Carbon\Carbon::parse($program->tanggal_selesai)->format('d M Y') }}
                </p>
                <p>{{ $program->deskripsi }}</p>
                <span class="badge bg-{{ 
                  $program->status == 'perencanaan' ? 'primary' : 
                  ($program->status == 'berjalan' ? 'warning' : 'success') 
                }}">
                  {{ ucfirst($program->status) }}
                </span>
              </div>
            </div>
          </div>
        @empty
          <div class="text-center text-muted py-5">
            <p>Belum ada program kerja yang ditambahkan.</p>
          </div>
        @endforelse
      </div>
    </div>
  </div>

</div>
@endsection

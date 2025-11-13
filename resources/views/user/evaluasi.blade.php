@extends('layouts.user')

@section('title', 'Evaluasi Kegiatan OSIS')

@section('content')
<div class="container py-5" style="min-height: 100vh;">
  
  <!-- Card Utama -->
  <div class="card shadow border-0">

    <!-- Header -->
    <div class="card-header bg-primary text-white text-center py-3">
      <h4 class="mb-0">📊 Evaluasi Kegiatan OSIS SMP N 5 Pekalongan</h4>
    </div>

    <!-- Isi Card -->
    <div class="card-body" style="background-color: #eaf2ff;">
      <div class="row justify-content-center">
        @forelse ($evaluasis as $e)
          <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
              <div class="card-body d-flex flex-column">
                <h5 class="fw-bold text-primary">{{ $e->nama_kegiatan }}</h5>
                <p class="text-muted small mb-2">
                  <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($e->tanggal)->format('d M Y') }}
                </p>
                <p class="mb-1"><strong>Hasil Evaluasi:</strong> {{ $e->hasil_evaluasi }}</p>
                <p class="mb-2"><strong>Penanggung Jawab:</strong> {{ $e->penanggung_jawab }}</p>
                <div class="mt-auto">
                  <span class="badge bg-{{ 
                    $e->status == 'baik' ? 'success' : 
                    ($e->status == 'perlu perbaikan' ? 'warning' : 'danger') 
                  }}">
                    {{ ucfirst($e->status) }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="text-center text-muted py-5">
            <p>Belum ada data evaluasi kegiatan.</p>
          </div>
        @endforelse
      </div>
    </div>

  </div>

</div>
@endsection

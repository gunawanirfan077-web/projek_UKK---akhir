@extends('layouts.user')

@section('title', 'Notulen Kegiatan OSIS')

@section('content')
<div class="container py-5" style="min-height: 100vh;">
  
  <!-- Card Utama -->
  <div class="card shadow border-0">
    
    <!-- Header -->
    <div class="card-header bg-primary text-white text-center py-3">
      <h4 class="mb-0">📝 Notulen Kegiatan OSIS SMP N 5 Pekalongan</h4>
    </div>

    <!-- Isi Card -->
    <div class="card-body" style="background-color: #eaf2ff;">
      <div class="row justify-content-center">
        @forelse ($notulen as $n)
          <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
              <div class="card-body">
                <h5 class="fw-bold text-primary">{{ $n->judul }}</h5>
                <p class="text-muted small mb-2">
                  <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($n->tanggal)->format('d M Y') }}
                </p>
                <p class="mb-1"><strong>Tempat:</strong> {{ $n->tempat }}</p>
                <p class="mb-1"><strong>Pembicara:</strong> {{ $n->pembicara }}</p>
                <p class="mb-2"><strong>Penulis:</strong> {{ $n->penulis }}</p>
                <hr class="my-2">
                <div class="border rounded bg-light p-2" style="max-height: 150px; overflow-y: auto;">
                  {!! nl2br(e(Str::limit($n->isi, 250, '...'))) !!}
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="text-center text-muted py-5">
            <p>Belum ada notulen kegiatan yang ditambahkan.</p>
          </div>
        @endforelse
      </div>
    </div>
  </div>

</div>
@endsection

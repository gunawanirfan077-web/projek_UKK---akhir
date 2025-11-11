@extends('layouts.user')

@section('title', 'Data Anggota')

@section('content')
<h3 class="text-center mb-4 text-primary fw-bold">👥 Data Anggota OSIS</h3>

<div class="row justify-content-center">
  @forelse ($data as $anggota)
    <div class="col-md-4 col-lg-3 mb-4">
      <div class="card border-0 shadow-sm text-center h-100">
        <div class="card-body">
          <!-- Foto -->
          @if ($anggota->foto)
            <img src="{{ asset('storage/' . $anggota->foto) }}"
                 alt="{{ $anggota->nama }}"
                 class="rounded-circle mb-3"
                 width="120" height="120"
                 style="object-fit: cover;">
          @endif

          <h5 class="fw-bold mb-1">{{ $anggota->nama }}</h5>
          <p class="text-muted mb-1">{{ $anggota->jabatan }}</p>
          <p class="small text-secondary mb-0">📞 {{ $anggota->no_hp ?? '-' }}</p>
        </div>
      </div>
    </div>
  @empty
    <div class="text-center text-muted">
      <p>Belum ada data anggota.</p>
    </div>
  @endforelse
</div>
@endsection

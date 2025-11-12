@extends('layouts.user') <!-- Pastikan layout user sudah ada -->

@section('title', 'Notulen Kegiatan')

@section('content')
<div class="container mt-4">
    <h3>📝 Notulen Kegiatan</h3>

    @if($notulen->count() > 0)
        <!-- 🔹 Card induk -->
        <div class="card shadow-sm mb-5">
            <div class="card-body">
                <div class="row g-3">
                    @foreach($notulen as $n)
                        <div class="col-md-6 col-lg-4">
                            <!-- 🔹 Card untuk tiap notulen -->
                            <div class="card h-100 border-secondary shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $n->judul }}</h5>
                                    <p class="card-text mb-1"><strong>Tanggal:</strong> {{ $n->tanggal }}</p>
                                    <p class="card-text mb-1"><strong>Tempat:</strong> {{ $n->tempat }}</p>
                                    <p class="card-text mb-1"><strong>Pembicara:</strong> {{ $n->pembicara }}</p>
                                    <p class="card-text mb-0"><strong>Penulis:</strong> {{ $n->penulis }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <p class="text-center text-muted mt-4">Belum ada data notulen.</p>
    @endif
</div>
@endsection

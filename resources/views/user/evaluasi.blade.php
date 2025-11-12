@extends('layouts.user') <!-- Pastikan layout user sudah ada -->

@section('title', 'Evaluasi Kegiatan')

@section('content')
<div class="container mt-4">
    <h3 class="text-center mt-5">📊 Evaluasi Kegiatan</h3>

    @if($evaluasis->count() > 0)
        <!-- 🔹 Card induk dengan jarak bawah -->
        <div class="card shadow-sm mb-5"> <!-- mb-5 untuk memberi jarak bawah Card induk -->
            <div class="card-body">
                <div class="row g-3">
                    @foreach($evaluasis as $e)
                        <div class="col-md-6 col-lg-4">
                            <!-- 🔹 Card untuk tiap evaluasi -->
                            <div class="card h-100 border-secondary shadow-sm">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $e->nama_kegiatan }}</h5>
                                    <p class="card-text mb-1"><strong>Tanggal:</strong> {{ $e->tanggal }}</p>
                                    <p class="card-text mb-1"><strong>Hasil Evaluasi:</strong> {{ $e->hasil_evaluasi }}</p>
                                    <p class="card-text mb-1"><strong>Penanggung Jawab:</strong> {{ $e->penanggung_jawab }}</p>
                                    <p class="card-text mt-auto">
                                        <span class="badge bg-{{ $e->status == 'baik' ? 'success' : ($e->status == 'perlu perbaikan' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($e->status) }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <p class="text-center text-muted mt-4">Belum ada data evaluasi.</p>
    @endif
</div>
@endsection

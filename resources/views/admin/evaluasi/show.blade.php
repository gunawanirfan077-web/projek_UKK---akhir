@extends('layouts.app')

@section('title', 'Detail Evaluasi')

@section('content')
<div class="container mt-5">
  <div class="card shadow-lg border-0 mx-auto" style="max-width: 700px; border-radius: 15px;">
    <div class="card-header bg-primary text-white text-center">
      <h4>📊 Detail Evaluasi Kegiatan</h4>
    </div>
    <div class="card-body">
      <p><strong>📝 Nama Kegiatan:</strong> {{ $evaluasi->nama_kegiatan }}</p>
      <p><strong>📅 Tanggal:</strong> {{ \Carbon\Carbon::parse($evaluasi->tanggal)->translatedFormat('d F Y') }}</p>
      <p><strong>👤 Penanggung Jawab:</strong> {{ $evaluasi->penanggung_jawab }}</p>
      <p><strong>🗒️ Hasil Evaluasi:</strong> {{ $evaluasi->hasil_evaluasi }}</p>
      <p><strong>📈 Status:</strong> 
        <span class="badge bg-{{ $evaluasi->status == 'baik' ? 'success' : ($evaluasi->status == 'perlu perbaikan' ? 'warning' : 'danger') }}">
          {{ ucfirst($evaluasi->status) }}
        </span>
      </p>
      <div class="text-end mt-4">
        <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection

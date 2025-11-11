@extends('layouts.app')

@section('title', 'Detail Rapat')

@section('content')
<div class="container mt-5">
  <div class="card shadow-lg border-0 mx-auto" style="max-width: 700px; border-radius: 15px;">
    <div class="card-header bg-primary text-white text-center">
      <h4>Detail Rapat</h4>
    </div>
    <div class="card-body">
      <p><strong>📝 Nama Rapat:</strong> {{ $rapat->nama_rapat }}</p>
      <p><strong>📅 Tanggal:</strong> {{ \Carbon\Carbon::parse($rapat->tanggal)->translatedFormat('d F Y') }}</p>
      <p><strong>📍 Tempat:</strong> {{ $rapat->tempat }}</p>
      <p><strong>📊 Status:</strong> 
        <span class="badge bg-{{ $rapat->status == 'selesai' ? 'success' : 'warning' }}">
          {{ ucfirst($rapat->status) }}
        </span>
      </p>
      <div class="text-end">
          <a href="{{ route('rapat.index') }}" class="btn btn-secondary mt-3">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection



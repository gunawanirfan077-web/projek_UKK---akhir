@extends('layouts.app')

@section('title', 'Detail Notulen Kegiatan')

@section('content')
<div class="container mt-5">
  <div class="card shadow border-0 mx-auto" style="max-width: 700px;">
    <div class="card-header bg-primary text-white text-center">
      <h4 class="mb-0">{{ $notulen->judul }}</h4>
    </div>
    <div class="card-body">
      <p><strong>Tanggal:</strong> {{ $notulen->tanggal }}</p>
      <p><strong>Tempat:</strong> {{ $notulen->tempat }}</p>
      <p><strong>Pembicara:</strong> {{ $notulen->pembicara }}</p>
      <p><strong>Penulis:</strong> {{ $notulen->penulis }}</p>
      <hr>
      <p><strong>Isi Notulen:</strong></p>
      <div class="border rounded p-3 bg-light">
        {!! nl2br(e($notulen->isi)) !!}
      </div>
    </div>
    <div class="card-footer text-end">
      <a href="{{ route('notulen.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </div>
</div>
@endsection

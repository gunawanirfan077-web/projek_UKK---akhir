@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
<div class="container mt-5">
  <div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;">
    <div class="card-header bg-primary text-white text-center">
      <h4 class="mb-0">Detail Anggota</h4>
    </div>
    <div class="card-body text-center">

      @if ($anggota->foto)
        <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto" width="150" height="150" class="rounded-circle mb-3 object-fit-cover">
      @endif

      <p><strong>Kode Anggota:</strong> {{ $anggota->kode_anggota }}</p>
      <p><strong>Nama:</strong> {{ $anggota->nama }}</p>
      <p><strong>Jabatan:</strong> {{ $anggota->jabatan }}</p>
      <p><strong>No HP:</strong> {{ $anggota->no_hp ?? '-' }}</p>

      <div class="text-end">
        <a href="{{ route('data_anggota.index') }}" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection

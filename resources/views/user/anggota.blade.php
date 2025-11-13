@extends('layouts.user')

@section('title', 'Data Anggota')

@section('content')
<div class="container-fluid mt-4 mb-5">
  <div class="card shadow border-0">
    <div class="card-header bg-primary text-white text-center py-3">
      <h4 class="mb-0">👥 Data Anggota OSIS SMP N 5 Pekalongan</h4>
    </div>

    <div class="card-body">
      @if ($data->isEmpty())
        <div class="text-center text-muted py-4">
          <p>Belum ada data anggota.</p>
        </div>
      @else
        <div class="table-responsive">
          <table class="table table-bordered text-center align-middle">
            <thead class="table-primary">
              <tr>
                <th style="width: 5%">No</th>
                <th style="width: 25%">Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>No. HP</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $index => $anggota)
              <tr style="height: 180px;"> {{-- 🔹 Tinggi baris menyesuaikan foto --}}
                <td class="align-middle">{{ $index + 1 }}</td>
                <td class="align-middle">
                  @if ($anggota->foto)
                    <div class="d-flex justify-content-center">
                      <img src="{{ asset('storage/' . $anggota->foto) }}"
                           alt="{{ $anggota->nama }}"
                           width="150" height="150"
                           class="rounded-circle border border-3 border-primary shadow-sm"
                           style="object-fit: cover; image-rendering: crisp-edges;">
                    </div>
                  @else
                    <span class="text-muted">-</span>
                  @endif
                </td>
                <td class="fw-semibold align-middle">{{ $anggota->nama }}</td>
                <td class="align-middle">{{ $anggota->jabatan }}</td>
                <td class="align-middle">{{ $anggota->no_hp ?? '-' }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection

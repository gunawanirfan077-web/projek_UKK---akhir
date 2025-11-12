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
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>No. HP</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $index => $anggota)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                  @if ($anggota->foto)
                    <img src="{{ asset('storage/' . $anggota->foto) }}"
                         alt="{{ $anggota->nama }}"
                         width="60" height="60"
                         class="rounded-circle"
                         style="object-fit: cover;">
                  @else
                    <span class="text-muted">-</span>
                  @endif
                </td>
                <td>{{ $anggota->nama }}</td>
                <td>{{ $anggota->jabatan }}</td>
                <td>{{ $anggota->no_hp ?? '-' }}</td>
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

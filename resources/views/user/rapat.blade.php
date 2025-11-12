@extends('layouts.user')

@section('title', 'Daftar Rapat')

@section('content')
<div class="container mt-4 mb-5">
  <div class="card shadow border-0">
    <div class="card-header bg-primary text-white text-center py-3">
      <h4 class="mb-0">🗓️ Daftar Rapat OSIS</h4>
    </div>

    <div class="card-body">
      @if ($rapat->isEmpty())
        <div class="text-center text-muted py-4">
          <p>Belum ada jadwal rapat.</p>
        </div>
      @else
        <div class="table-responsive">
          <table class="table table-bordered align-middle text-center">
            <thead class="table-primary">
              <tr>
                <th>No</th>
                <th>Nama Rapat</th>
                <th>Tanggal</th>
                <th>Tempat</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rapat as $i => $r)
                <tr>
                  <td>{{ $i + 1 }}</td>
                  <td>{{ $r->nama_rapat }}</td>
                  <td>{{ \Carbon\Carbon::parse($r->tanggal)->translatedFormat('d F Y') }}</td>
                  <td>{{ $r->tempat }}</td>
                  <td>
                    <span class="badge bg-{{ $r->status == 'selesai' ? 'success' : 'warning' }}">
                      {{ ucfirst($r->status) }}
                    </span>
                  </td>
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

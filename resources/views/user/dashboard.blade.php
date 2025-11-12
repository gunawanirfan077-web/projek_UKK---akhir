@extends('layouts.user')

@section('title', 'Dashboard User')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner">

    <!-- Slide 1 -->
    <div class="carousel-item active">
      <img src="{{ asset('img/a.jpg') }}" class="d-block w-100 full-image" alt="Gambar 1">
      <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
        <h1 class="welcome-text">Welcome to OSIS SMP N 5 Pekalongan</h1>
        <p class="desc-text">Mewujudkan siswa berkarakter, kreatif, dan berprestasi.</p>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item">
      <img src="{{ asset('img/b.jpg') }}" class="d-block w-100 full-image" alt="Gambar 2">
      <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
        <h1 class="welcome-text">Semangat Kebersamaan</h1>
        <p class="desc-text">Bersatu dalam visi, melangkah menuju prestasi.</p>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-item">
      <img src="{{ asset('img/c.jpg') }}" class="d-block w-100 full-image" alt="Gambar 3">
      <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
        <h1 class="welcome-text">OSIS Hebat, Sekolah Kuat</h1>
        <p class="desc-text">Mendorong kegiatan positif demi masa depan cerah.</p>
      </div>
    </div>

  </div>

  <!-- Tombol navigasi -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Sebelumnya</span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Berikutnya</span>
  </button>
</div>
@endsection


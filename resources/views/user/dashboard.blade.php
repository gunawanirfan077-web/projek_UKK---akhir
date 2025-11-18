@extends('layouts.user')

@section('title', 'Dashboard User')

@section('content')

<!-- ===== CAROUSEL ===== -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">

  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
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


  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>


<!-- ===== VISI & MISI ===== -->
<div class="container my-5">
  <div class="card shadow-lg border-0">

    <div class="card-header bg-primary text-white text-center py-3">
      <h3 class="m-0">VISI & MISI OSIS</h3>
    </div>

    <div class="card-body p-4">

      <!-- VISI -->
      <h4 class="fw-bold">VISI</h4>
      <p class="text-secondary">
        Mewujudkan siswa SMP N 5 Pekalongan yang berkarakter, berprestasi, disiplin, dan berakhlak mulia.
      </p>

      <hr>

      <!-- MISI -->
      <h4 class="fw-bold">MISI</h4>
      <ul class="text-secondary">
        <li>Meningkatkan kegiatan akademik dan non-akademik siswa.</li>
        <li>Menumbuhkan sikap kepemimpinan dan tanggung jawab.</li>
        <li>Mendorong kreativitas siswa dalam berbagai bidang.</li>
        <li>Menciptakan lingkungan sekolah yang aman dan nyaman.</li>
      </ul>

    </div>
  </div>
</div>


<!-- ===== FOOTER ===== -->
<footer class="bg-primary text-white mt-5 pt-4 pb-3">
  <div class="container">
    <div class="row">

      <!-- Deskripsi OSIS -->
      <div class="col-md-6 mb-4 text-center text-md-start">
        <h5 class="fw-bold mb-2">OSIS SMP N 5 Pekalongan</h5>
        <p class="small mb-0">
          Organisasi Siswa Intra Sekolah (OSIS) SMP Negeri 5 Pekalongan merupakan wadah untuk mengembangkan karakter,
          kreativitas, kemampuan sosial, dan tanggung jawab siswa.
          Melalui berbagai program kerja dan kegiatan positif, OSIS berkomitmen menciptakan lingkungan sekolah yang aktif,
          inovatif, dan penuh nilai-nilai kedisiplinan serta kepemimpinan.
        </p>
      </div>

      <!-- Kontak -->
      <div class="col-md-6 mb-4 text-center text-md-end">
        <h5 class="fw-bold mb-2">Kontak</h5>
        <p class="small mb-1">📍 Jl. Sriwijaya, Pekalongan</p>
        <p class="small mb-1">✉ osis@smpn5.sch.id</p>
        <p class="small mb-0">📞 0812-3456-7890</p>
      </div>

    <hr class="border-light">
    
</footer>

@endsection



 
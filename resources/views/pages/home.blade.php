
@extends('layouts.app')

@section('title', 'Home - Dashboard PPKA')

@section('content')
<home>
  <link rel="stylesheet" href="{{ asset('asset/css/home.css') }}">
</home>
<section class="hero text-center text-lg-start">
  <div class="container d-flex flex-column flex-lg-row align-items-center justify-content-center">
    <div class="ps-3 mb-5 mb-lg-0 col-lg-6">
      <h1>
        PPKA <span class="highlight">Siap</span> Mewujudkan<br />
        Masa Depan <strong><span class="highlight">Karier</span> Anda</strong>
      </h1>
      <p class="text-muted my-3">
        Pusat Pengembangan Karier (PPKA) hadir untuk mendampingi mahasiswa dan alumni
        dalam meraih peluang kerja terbaik melalui layanan karier yang terintegrasi.
      </p>
      <a href="#" class="btn btn-orange">Lowongan Kerja</a>
    </div>
    <div class="pe-3 col-lg-5 text-center">
      <img src="{{ asset('asset/backgroundhome.png') }}" class="img-fluid" alt="Illustration" />
    </div>
  </div>
</section>
<!-- Layanan Kami -->
  <section class="py-5 section-layanan">
    <div class="container">
      <h3 class="text-center mb-5 text-white fw-bold" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.4);">Layanan Kami</h3>

      <div class="row g-4">
        <div class="col-md-4 layanan-card">
          <div class="card h-100 text-center p-4">
            <div class="icon"><i class="bi bi-graph-up-arrow"></i></div>
            <h5 class="card-title">Tracer Study</h5>
            <p class="card-text">
              Membantu mengumpulkan data alumni untuk evaluasi dan peningkatan kualitas pendidikan serta hubungan antara kampus dan dunia kerja.
            </p>
          </div>
        </div>
        <div class="col-md-4 layanan-card">
          <div class="card h-100 text-center p-4">
            <div class="icon"><i class="bi bi-person-workspace"></i></div>
            <h5 class="card-title">Pelatihan Karir</h5>
            <p class="card-text">
              Memberikan pelatihan seperti pembuatan CV, teknik wawancara, dan pengembangan soft skill bagi mahasiswa dan alumni.
            </p>
          </div>
        </div>
        <div class="col-md-4 layanan-card">
          <div class="card h-100 text-center p-4">
            <div class="icon"><i class="bi bi-briefcase-fill"></i></div>
            <h5 class="card-title">Informasi Lowongan Kerja</h5>
            <p class="card-text">
              Menyediakan informasi lowongan kerja terbaru dan membuka akses alumni terhadap perusahaan-perusahaan mitra.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
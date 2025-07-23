@extends('layouts.app')

@section('title', 'Tentang - Dashboard PPKA')

@section('content')
<home>
<link rel="stylesheet" href="{{ asset('asset/css/tentang.css') }}">
</home>
<section class="about-section">
    <div class="container">
      <div class="row ">
        <!-- Gambar Kiri -->
        <div class="col-md-6">
          <img src="{{ asset('asset/backgroundhome.png') }}" alt="Tentang Kami" class="about-img">
        </div>

        <!-- Teks Kanan -->
        <div class="col-md-6 about-text">
          <h2 class="text-center">Tentang Kami</h2>
          <p>
           Pusat Pengembangan Karier (PPKA) Universitas Muhammadiyah Purworejo merupakan unit yang bertujuan untuk membekali mahasiswa dan alumni dalam mempersiapkan diri menghadapi dunia kerja. Kami menyediakan berbagai layanan seperti pelatihan karier, informasi lowongan kerja, serta tracer study alumni.
Melalui pendekatan yang profesional dan berbasis data, PPKA Universitas Muhammadiyah Purworejo berkomitmen menjadi jembatan antara dunia pendidikan dan dunia industri, membantu menciptakan lulusan yang siap bersaing di era global serta mampu memberikan kontribusi nyata bagi masyarakat.
          </p>
          
        </div>
      </div>
    </div>
  </section>
  @endsection
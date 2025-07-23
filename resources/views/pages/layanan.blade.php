@extends('layouts.app')

@section('title', 'Layanan - Dashboard PPKA')

@section('content')
<home>
<link rel="stylesheet" href="{{ asset('asset/css/layanan.css') }}">
</home>
<section class="section-layanan">
    <div class="container">
      <div class="text-center mb-5">
        <h2>Layanan Kami</h2>
        <p class="text-muted">Kami menyediakan berbagai layanan untuk mendukung kesiapan karier mahasiswa dan alumni.</p>
      </div>

     <!-- Layanan 1 -->
<div class="row align-items-stretch layanan-row mb-5">
  <div class="col-md-6 d-flex">
    <div class="layanan-block text-center p-4 w-100 shadow rounded bg-white">
      <i class="bi bi-graph-up-arrow layanan-icon mb-3"></i>
      <h4>Tracer Study</h4>
      <p>
        Kami melakukan tracer study secara rutin untuk mengetahui posisi dan persebaran alumni di dunia kerja.
        Data ini sangat penting untuk mengevaluasi kurikulum, metode pengajaran, dan relevansi pendidikan tinggi
        dengan kebutuhan industri. Alumni akan dihubungi untuk mengisi kuesioner pasca lulus guna mendukung akreditasi kampus.
      </p>
    </div>
  </div>
  <div class="col-md-6 d-flex justify-content-center align-items-center">
    <img src="{{ asset('asset/lowongan.png') }}" class="img-fluid rounded w-100 h-auto" alt="Tracer Study" style="max-height: 100%;">
  </div>
</div>


      <!-- Layanan 2 -->
      <div class="row align-items-stretch flex-md-row-reverse layanan-row mb-5">
        <div class="col-md-6 d-flex">
          <div class="layanan-block text-center p-4 w-100 shadow rounded bg-white">
            <i class="bi bi-person-video3 layanan-icon"></i>
            <h4>Pelatihan Karier</h4>
            <p>
              Kami menyelenggarakan berbagai pelatihan seperti pembuatan CV, simulasi wawancara kerja, dan pengembangan
              soft skill seperti kepemimpinan, komunikasi, serta etika kerja. Tujuannya adalah untuk meningkatkan
              kesiapan mahasiswa dalam menghadapi proses rekrutmen dan membangun karier yang sukses.
            </p>
          </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
          <img src="{{ asset('asset/lowongan.png') }}" class="img-fluid rounded" alt="Pelatihan Karier">
        </div>
      </div>

      <!-- Layanan 3 -->
      <div class="row align-items-stretch layanan-row mb-5">
  <div class="col-md-6 d-flex">
    <div class="layanan-block text-center p-4 w-100 shadow rounded bg-white">
      
            <i class="bi bi-briefcase-fill layanan-icon"></i>
            <h4>Informasi Lowongan Kerja</h4>
            <p>
              PPKA menyediakan platform informasi lowongan kerja yang terhubung dengan berbagai perusahaan mitra.
              Mahasiswa dan alumni dapat mengakses info pekerjaan secara langsung dan mengikuti event rekrutmen seperti job fair,
              campus hiring, dan kerjasama magang untuk memperluas peluang karier.
            </p>
          </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
          <img src="{{ asset('asset/lowongan.png') }}" class="img-fluid rounded" alt="Informasi Lowongan Kerja">
        </div>
      </div>
    </div>
  </section>
@endsection
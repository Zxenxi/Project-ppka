@extends('layouts.app')

@section('title', 'Tentang - Dashboard PPKA')

@section('content')
<style>
  :root{
    --primary-color: #f95f35;
    --secondary-color: #ffe9e1;
    --text-dark: #1f2937;
    --muted: #6b7280;
  }

  /* ===== Section Wrapper ===== */
  body{ background: linear-gradient(120deg,#fff 0%, var(--secondary-color) 100%); }
  .about-section{ position: relative; padding: 80px 0; overflow: hidden; }
  .about-section::before,
  .about-section::after{
    content:""; position:absolute; border-radius: 999px; filter: blur(20px); opacity:.35; pointer-events:none;
  }
  .about-section::before{ width:380px; height:380px; background: radial-gradient(closest-side, rgba(249,95,53,.15), transparent 70%); top:-80px; left:-120px; }
  .about-section::after { width:460px; height:460px; background: radial-gradient(closest-side, rgba(249,95,53,.12), transparent 70%); bottom:-140px; right:-160px; }

  /* ===== Card Container ===== */
  .about-card{
    background: rgba(255,255,255,.7);
    backdrop-filter: blur(6px);
    border: 1px solid rgba(0,0,0,.05);
    border-radius: 18px;
    box-shadow: 0 20px 50px rgba(0,0,0,.06);
    padding: 28px;
  }

  /* ===== Image ===== */
  .about-img{
    max-width: 100%;
    border-radius: 16px;
    box-shadow: 0 16px 40px rgba(0,0,0,.10);
    transform: translateZ(0);
    transition: transform .35s ease, box-shadow .35s ease;
  }
  .about-img:hover{
    transform: translateY(-4px);
    box-shadow: 0 26px 60px rgba(0,0,0,.14);
  }

  /* ===== Text ===== */
  .about-text h2{
    font-weight: 800; color: var(--text-dark); letter-spacing: -0.02em; position: relative;
  }
  .about-text h2 .eyebrow{
    display:inline-block; font-size:.85rem; color: var(--muted);
    padding:.3rem .7rem; border:1px solid rgba(0,0,0,.08); border-radius:999px; background:#fff; margin-bottom:.6rem;
  }
  .about-text h2 .accent{
    position:absolute; left:0; bottom:-10px; height:6px; width:120px;
    background: linear-gradient(90deg, var(--primary-color), #ffa07a);
    border-radius: 6px; opacity:.9;
  }
  .about-text p{
    font-size:1.05rem; line-height:1.75; color: var(--muted); margin-top: 22px;
  }

  /* ===== Responsive ===== */
  @media (max-width: 991.98px){
    .about-section{ padding: 56px 0; }
    .about-card{ padding: 22px; }
    .about-text{ margin-top: 22px; }
  }
</style>

<section class="about-section">
  <div class="container">
    <div class="about-card">
      <div class="row align-items-center g-4">
        <!-- Gambar Kiri -->
        <div class="col-md-6">
          <img src="{{ asset('asset/backgroundhome.png') }}" alt="Tentang Kami" class="about-img">
        </div>

        <!-- Teks Kanan -->
        <div class="col-md-6 about-text">
          <span class="eyebrow">Pusat Pengembangan Karier & Alumni</span>
          <h2 class="mb-3">Tentang Kami <span class="accent"></span></h2>
          <p>
            Pusat Pengembangan Karier (PPKA) Universitas Muhammadiyah Purworejo merupakan unit yang bertujuan untuk membekali mahasiswa dan alumni dalam mempersiapkan diri menghadapi dunia kerja. Kami menyediakan berbagai layanan seperti pelatihan karier, informasi lowongan kerja, serta tracer study alumni.
            <br><br>
            Melalui pendekatan yang profesional dan berbasis data, PPKA Universitas Muhammadiyah Purworejo berkomitmen menjadi jembatan antara dunia pendidikan dan dunia industri, membantu menciptakan lulusan yang siap bersaing di era global serta mampu memberikan kontribusi nyata bagi masyarakat.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

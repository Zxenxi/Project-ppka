@extends('layouts.app')

@section('title', 'Home - Dashboard PPKA')

@section('content')
<style>
  .hero {
  padding: 60px 0;
  background: linear-gradient(to right, #ffffff, var(--secondary-color));
}

.hero h1 {
  font-weight: 700;
}

.highlight {
  color: var(--primary-color);
}

.hero img {
  max-width: 100%;
  height: auto;
}

.section-layanan {
  background-color: var(--primary-color);
  color: white;
}

.section-layanan .card {
  background-color: white;
  color: var(--text-dark);
  border-radius: 12px;
  border: none;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.section-layanan .card:hover {
  transform: translateY(-5px);
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
}

.section-layanan .icon {
  font-size: 40px;
  color: var(--primary-color);
  margin-bottom: 15px;
}
</style>

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


<!-- LAYANAN (versi tanpa penjelasan) -->
<section id="layanan" class="py-5 section-layanan">
  <div class="container">
    <h3 class="text-center mb-5 text-white fw-bold" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.4);">Layanan Kami</h3>
    <div class="row g-4 text-center">
      <div class="col-md layanan-card">
        <div class="card h-100 p-4">
          <div class="icon"><i class="bi bi-graph-up-arrow"></i></div>
          <h5 class="card-title">Tracer Study</h5>
        </div>
      </div>
      <div class="col-md layanan-card">
        <div class="card h-100 p-4">
          <div class="icon"><i class="bi bi-person-workspace"></i></div>
          <h5 class="card-title">Pelatihan Karier</h5>
        </div>
      </div>
      <div class="col-md layanan-card">
        <div class="card h-100 p-4">
          <div class="icon"><i class="bi bi-briefcase-fill"></i></div>
          <h5 class="card-title">Informasi Lowongan Kerja</h5>
        </div>
      </div>
      <div class="col-md layanan-card">
        <div class="card h-100 p-4">
          <div class="icon"><i class="bi bi-award-fill layanan-icon"></i></div>
          <h5 class="card-title">Lembaga Sertifikasi Profesi</h5>
        </div>
      </div>
      <div class="col-md layanan-card">
        <div class="card h-100 p-4">
          <div class="icon"><i class="bi bi-building-check layanan-icon"></i></div>
          <h5 class="card-title">Campus Hiring</h5>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- FAQ / HELP -->
<section class="section-faq py-5">
  <div class="container">
    <div class="row g-4 align-items-start">
      <div class="col-lg-5">
        <h2 class="mb-2">Butuh Bantuan?</h2>
        <p class="muted mb-4">Pertanyaan umum tentang layanan PPKA. Jika masih belum menemukan jawaban, hubungi kami melalui pusat bantuan.</p>
        <a href="#" class="btn btn-orange"><i class="bi bi-chat-dots"></i> Pusat Bantuan</a>
      </div>
      <div class="col-lg-7">
        <div class="accordion faq" id="faqPPKA">
          <div class="accordion-item">
            <h2 class="accordion-header" id="q1">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#a1" aria-expanded="true" aria-controls="a1">
                Bagaimana cara mendaftar pelatihan karier?
              </button>
            </h2>
            <div id="a1" class="accordion-collapse collapse show" aria-labelledby="q1" data-bs-parent="#faqPPKA">
              <div class="accordion-body">
                Buka laman <em>Pelatihan Karier</em>, pilih jadwal yang tersedia, lalu isi formulir pendaftaran. Notifikasi akan dikirim ke email Anda.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="q2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a2" aria-expanded="false" aria-controls="a2">
                Apakah ada bimbingan pembuatan CV?
              </button>
            </h2>
            <div id="a2" class="accordion-collapse collapse" aria-labelledby="q2" data-bs-parent="#faqPPKA">
              <div class="accordion-body">
                Ya, tersedia klinik CV mingguan dan template CV. Anda juga bisa menjadwalkan <em>review</em> 1:1 dengan konselor karier.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="q3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a3" aria-expanded="false" aria-controls="a3">
                Bagaimana cara mendapatkan notifikasi lowongan?
              </button>
            </h2>
            <div id="a3" class="accordion-collapse collapse" aria-labelledby="q3" data-bs-parent="#faqPPKA">
              <div class="accordion-body">
                Aktifkan notifikasi pada menu <strong>Lowongan</strong>, pilih kategori pekerjaan dan preferensi lokasi. Anda akan menerima pemberitahuan saat ada lowongan yang cocok.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

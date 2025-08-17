@extends('layouts.app')

@section('title', 'Berita - Dashboard PPKA')

@section('content')
<style>
  :root{
    --ppka-primary:#f95f35;
    --ppka-primary-dark:#d94b24;
    --ppka-text:#2b2b2b;
    --ppka-muted:#727272;
    --ppka-soft:#fff7f3;
    --card-shadow:0 8px 24px rgba(0,0,0,.08);
    --card-shadow-hover:0 14px 36px rgba(0,0,0,.14);
    --r-lg:18px;
  }

  body{ background:#fff; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:var(--ppka-text); }

  /* ===== Section (kartu di halaman utama) ===== */
  .section-berita{ padding:68px 0 84px; background:linear-gradient(#fff,var(--ppka-soft)); }
  .section-berita .section-berita__header h2{ color:var(--ppka-primary); letter-spacing:.2px; font-weight:800; }
  .section-berita .section-berita__header p{ color:#8f8f8f; margin:6px 0 0; }

  /* ===== Card (Grid) ===== */
  .section-berita .news-card{
    border:0; border-radius:22px;
    background:#fff; box-shadow:var(--card-shadow);
    overflow:hidden; transition:transform .22s ease, box-shadow .22s ease;
    display:flex; flex-direction:column; height:100%;
  }
  .section-berita .news-card:hover{ transform:translateY(-6px); box-shadow:var(--card-shadow-hover); }

  .section-berita .news-card__media{
    position:relative; width:100%;
    aspect-ratio:3/4; overflow:hidden;
    background:#f1f1f1; border-bottom:3px solid var(--ppka-primary);
  }
  .section-berita .news-card__img{
    position:absolute; inset:0; width:100%; height:100%;
    object-fit:cover; object-position:center;
    display:block; transition:transform .35s ease;
  }
  .section-berita .news-card:hover .news-card__img{ transform:scale(1.03); }

  .section-berita .news-card__body{
    display:grid; grid-template-rows:auto auto 1fr auto;
    gap:10px; padding:16px 18px 18px; min-height:220px;
  }
  .section-berita .news-card__meta{ font-size:13px; color:#999; display:flex; align-items:center; gap:6px; line-height:1; }
  .section-berita .news-card__title{
    margin:0; color:#222; font-weight:800; font-size:18px;
    display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;
  }
  .section-berita .news-card__desc{
    margin:0; color:#555; font-size:15px; text-align:justify;
    display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;
  }
  .section-berita .btn-detail{
    width:100%; height:44px;
    background:var(--ppka-primary); color:#fff; border:0;
    border-radius:12px; padding:0 14px; font-weight:700; font-size:15px;
    display:inline-flex; align-items:center; justify-content:center; gap:8px;
    transition:background .18s ease, transform .08s ease;
  }
  .section-berita .btn-detail:hover{ background:var(--ppka-primary-dark); }
  .section-berita .btn-detail:active{ transform:translateY(1px); }

  .section-berita .row.g-4 > [class*='col-']{ display:flex; }
  .section-berita .row.g-4 > [class*='col-'] > .news-card{ width:100%; }

  /* ===== DETAIL (Modal) — skala gambar UTUH (contain) ===== */
  .modal-dialog{ max-width:1000px; }
  .modal-content{ border:0; border-radius:var(--r-lg); overflow:hidden; box-shadow:0 18px 48px rgba(0,0,0,.18); }

  .detail__header{
    background:linear-gradient(135deg,var(--ppka-primary),var(--ppka-primary-dark));
    color:#fff; padding:14px 18px;
    display:flex; justify-content:space-between; align-items:center;
  }
  .detail__title{ margin:0; font-weight:800; font-size:20px; }
  .modal-body{ padding:0; }

  .modal .detail{
    display:grid; grid-template-columns: 320px 1fr;
    align-items:stretch; gap:0;
  }

  /* MEDIA: kontainer tinggi tetap, gambar di-center dan di-scale TANPA CROP */
  .modal .detail__media{
    width:100%;
    height:55vh;               /* tinggi panel kiri */
    padding:0;
    background:#000;           /* bisa diganti #fff jika tidak ingin latar gelap */
    display:flex; align-items:center; justify-content:center;
    overflow:hidden;
  }
  .modal .detail__img{
    max-width:100%;
    max-height:100%;
    width:auto;                /* biarkan rasio asli */
    height:auto;
    object-fit:contain;        /* <<— kunci: jangan dipotong */
    display:block;
  }

  .modal .detail__content{ padding:20px; max-height:55vh; overflow:auto; }
  .modal .detail__desc{ font-size:15px; line-height:1.65; color:#444; }
  .modal .detail__actions{ display:flex; flex-wrap:wrap; gap:10px; margin-top:14px; }
  .modal .btn-apply{ background:var(--ppka-primary); color:#fff; border:0; border-radius:10px; padding:10px 16px; font-weight:700; }
  .modal .btn-outline{ border:1px solid #ddd; background:#fff; color:#333; border-radius:10px; padding:10px 14px; font-weight:600; }
  .modal .btn-outline:hover{ background:#f9f9f9; }
  .modal-footer{ border-top:0; padding:14px 18px; }

  @media (max-width: 992px){ .modal .detail{ grid-template-columns: 280px 1fr; } }
  @media (max-width: 768px){
    .modal .detail{ grid-template-columns:1fr; }
    .modal .detail__media{ height:45vh; }
    .modal .detail__content{ max-height:none; }
  }
</style>

<section class="section-berita">
  <div class="container">
    <div class="section-berita__header text-center mb-5">
      <h2 class="fw-bold">Lowongan Pekerjaan</h2>
      <p class="text-muted">Ikuti kabar terbaru dan lowongan pekerjaan seputar pengembangan karier mahasiswa &amp; alumni</p>
    </div>

    <div class="row g-4 justify-content-center">
      @foreach($beritas as $berita)
      <div class="col-xl-3 col-lg-4 col-md-6 d-flex">
        <article class="news-card" aria-label="Berita: {{ $berita->judul }}">
          <!-- Gambar -->
          <div class="news-card__media">
            <img class="news-card__img" src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
          </div>

          <!-- Body -->
          <div class="news-card__body">
            <div class="news-card__meta">
              <i class="bi bi-clock"></i>
              <time datetime="{{ \Carbon\Carbon::parse($berita->tanggal_upload)->toDateString() }}">
                {{ \Carbon\Carbon::parse($berita->tanggal_upload)->format('d M Y') }}
              </time>
            </div>

            <h3 class="news-card__title">{{ $berita->judul }}</h3>

            <p class="news-card__desc">
              {{ \Illuminate\Support\Str::limit(strip_tags($berita->deskripsi), 120, '…') }}
            </p>

            <button class="btn btn-detail mt-auto" data-bs-toggle="modal" data-bs-target="#modalBerita{{ $berita->id }}">
              <i class="bi bi-eye"></i> Lihat Detail
            </button>
          </div>
        </article>
      </div>

      <!-- Modal (detail) -->
      <div class="modal fade" id="modalBerita{{ $berita->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="detail__header">
              <h4 class="detail__title">{{ $berita->judul }}</h4>
              <span><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($berita->tanggal_upload)->format('d M Y') }}</span>
            </div>

            <div class="modal-body">
              <div class="detail">
                <!-- Kiri: gambar skala contain -->
                <div class="detail__media">
                  <img class="detail__img" src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                </div>

                <!-- Kanan: konten -->
                <div class="detail__content">
                  <div class="detail__desc">{!! nl2br(e($berita->deskripsi)) !!}</div>

                  <div class="detail__actions">
                    @isset($berita->tautan)
                      <a href="{{ $berita->tautan }}" target="_blank" rel="noopener" class="btn-apply">
                        <i class="bi bi-box-arrow-up-right me-1"></i> Lamar / Kunjungi
                      </a>
                    @endisset
                    <button class="btn-outline" type="button" data-copy-link="{{ url()->current() }}">
                      <i class="bi bi-share me-1"></i> Bagikan
                    </button>
                    <button class="btn-outline" type="button" data-lightbox="{{ asset('storage/' . $berita->gambar) }}">
                      <i class="bi bi-aspect-ratio me-1"></i> Lihat Penuh
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /Modal -->
      @endforeach
    </div>
  </div>
</section>

<script>
  // util kecil: copy link & lihat penuh
  document.addEventListener('click', async (e) => {
    const btn = e.target.closest('[data-copy-link]');
    if(btn){
      try{
        await navigator.clipboard.writeText(btn.getAttribute('data-copy-link'));
        btn.innerHTML = '<i class="bi bi-check2 me-1"></i>Tersalin';
        setTimeout(()=>{ btn.innerHTML = '<i class="bi bi-share me-1"></i> Bagikan'; },1200);
      }catch{ alert('Gagal menyalin tautan'); }
    }
    const lb = e.target.closest('[data-lightbox]');
    if(lb){ window.open(lb.getAttribute('data-lightbox'),'_blank','noopener'); }
  });
</script>
@endsection

@extends('layouts.app')

@section('title', 'Berita - Dashboard PPKA')

@section('content')
<style>
  section {
    background: linear-gradient(to right, #ffffff, var(--secondary-color));
  }

  .card-berita {
    cursor: pointer;
    transition: transform 0.3s ease;
  }

  .card-berita:hover {
    transform: scale(1.02);
  }

  .berita-image {
    height: 200px;
    object-fit: cover;
    width: 100%;
  }
</style>

<home>
  <link rel="stylesheet" href="{{ asset('asset/css/berita.css') }}">
</home>

<section class="section-berita py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Lowongan Pekerjaan</h2>
      <p class="text-muted">Ikuti kabar terbaru dan lowongan pekerjaan seputar pengembangan karier mahasiswa & alumni</p>
    </div>

    <div class="row g-4">
      @foreach($beritas as $berita)
      <div class="col-md-4">
        <!-- Kartu Berita -->
        <div class="card card-berita border-0 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalBerita{{ $berita->id }}" style="border-radius: 12px; overflow: hidden;">
          <img src="{{ asset('storage/' . $berita->gambar) }}" class="berita-image" alt="{{ $berita->judul }}">
          <div class="card-body">
            <div class="berita-meta mb-2 text-muted"><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($berita->tanggal_upload)->format('d M Y') }}</div>
            <h5 class="berita-title fw-semibold">{{ $berita->judul }}</h5>
            <p class="berita-desc text-secondary">{{ Str::limit($berita->deskripsi, 120, '...') }}</p>
          </div>
        </div>
      </div>

      <!-- Modal Detail Berita -->
      <div class="modal fade" id="modalBerita{{ $berita->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $berita->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel{{ $berita->id }}">{{ $berita->judul }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid rounded mb-3">
              <div class="text-muted mb-2"><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($berita->tanggal_upload)->format('d M Y') }}</div>
              <p class="text-dark" style="text-align: justify;">{{ $berita->deskripsi }}</p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection

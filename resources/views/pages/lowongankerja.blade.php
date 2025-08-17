@extends('layouts.app')

@section('title', 'Lowongan Pekerjaan - PPKA')

@section('content')
    <style>
        :root {
            --ppka-primary: #f95f35;
            --ppka-primary-dark: #d94b24;
            --ppka-text: #2b2b2b;
            --ppka-muted: #727272;
            --ppka-soft: #fff7f3;
            --card-shadow: 0 8px 24px rgba(0, 0, 0, .08);
            --card-shadow-hover: 0 14px 36px rgba(0, 0, 0, .14);
            --r-lg: 18px;
            --r-md: 12px;
        }

        body {
            background: #fdfdfd;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--ppka-text);
        }

        .section-lowongan {
            padding: 60px 0 80px;
        }

        .section-header {
            margin-bottom: 50px;
        }

        .section-header .title {
            font-size: 2.5rem;
            font-weight: 800;
        }

        .section-header .subtitle {
            font-size: 1.1rem;
            color: var(--ppka-muted);
        }

        .job-card {
            border: 1px solid #eee;
            border-radius: var(--r-lg);
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .04);
            transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .job-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--card-shadow-hover);
            border-color: var(--ppka-primary);
        }

        .job-card__media {
            position: relative;
            width: 100%;
            height: 180px;
            background: #f1f1f1;
        }

        .job-card__img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .35s ease;
        }

        .job-card:hover .job-card__img {
            transform: scale(1.05);
        }

        .job-card__body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .job-card__company-logo {
            width: 50px;
            height: 50px;
            border-radius: var(--r-md);
            border: 1px solid #eee;
            padding: 4px;
            background: #fff;
            margin-top: -45px;
            margin-bottom: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, .1);
        }

        .job-card__title {
            margin: 0 0 8px;
            color: var(--ppka-text);
            font-weight: 700;
            font-size: 1.15rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .job-card__company {
            color: var(--ppka-muted);
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 16px;
        }

        .job-card__meta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 0.85rem;
            color: #666;
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid #f0f0f0;
        }

        .job-card__meta>div {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .job-card .btn-detail {
            width: 100%;
            height: 44px;
            background: var(--ppka-primary);
            color: #fff;
            border: 0;
            border-radius: var(--r-md);
            font-weight: 700;
            font-size: 15px;
            margin-top: 20px;
            transition: background .18s ease;
        }

        .job-card .btn-detail:hover {
            background: var(--ppka-primary-dark);
        }

        .modal-dialog {
            max-width: 800px;
        }

        .modal-content {
            border: 0;
            border-radius: var(--r-lg);
        }

        .modal-header {
            background: var(--ppka-soft);
            border-bottom: 1px solid #eee;
            padding: 20px 25px;
        }

        .modal-body {
            padding: 25px;
        }

        .modal-footer {
            border-top: 0;
            padding: 15px 25px;
        }

        .detail-job__company {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .detail-job__logo {
            width: 60px;
            height: 60px;
            border-radius: var(--r-md);
            object-fit: cover;
        }

        .detail-job__title {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }

        .detail-job__company-name {
            color: var(--ppka-muted);
            font-weight: 600;
        }

        .detail-job__meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 20px;
            font-size: 0.9rem;
            color: #555;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #f0f0f0;
        }

        .detail-job__meta>div {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .detail-job__meta i {
            color: var(--ppka-primary);
        }

        .detail-job__section-title {
            font-weight: 700;
            color: var(--ppka-text);
            margin-top: 25px;
            margin-bottom: 10px;
        }

        .detail-job__desc {
            line-height: 1.7;
            text-align: justify;
        }

        .detail-job__image-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            border-radius: var(--r-md);
            overflow: hidden;
            background-color: #f4f4f4;
            max-height: 350px;
            /* <--- Batas tinggi maksimal gambar */
        }

        .detail-job__image-container img {
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            /* <--- Pastikan gambar utuh */
            transition: transform .2s ease;
        }

        .detail-job__image-container:hover img {
            transform: scale(1.03);
        }
    </style>

    <section class="section-lowongan">
        <div class="container">
            <div class="section-header text-center">
                <h1 class="title">Peluang Karir</h1>
                <p class="subtitle">Temukan dan raih kesempatan karir terbaik yang sesuai dengan minat dan potensimu.</p>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($lowonganPekerjaans as $lowonganPekerjaan)
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex">
                        <article class="job-card">
                            <div class="job-card__media">
                                <img class="job-card__img" src="{{ asset('storage/' . $lowonganPekerjaan->gambar) }}"
                                    alt="{{ $lowonganPekerjaan->judul }}">
                            </div>
                            <div class="job-card__body">
                                <img src="{{ asset('asset/logo.png') }}" alt="Logo Perusahaan"
                                    class="job-card__company-logo">
                                <h3 class="job-card__title">{{ $lowonganPekerjaan->judul }}</h3>
                                <div class="job-card__company">{{ $lowonganPekerjaan->nama_perusahaan }}</div>
                                <div class="job-card__meta">
                                    <div><i class="bi bi-geo-alt-fill"></i> {{ $lowonganPekerjaan->lokasi }}</div>
                                    <div><i class="bi bi-briefcase-fill"></i> {{ $lowonganPekerjaan->tipe_pekerjaan }}</div>
                                </div>
                                <button class="btn btn-detail mt-auto" data-bs-toggle="modal"
                                    data-bs-target="#modalLowonganPekerjaan{{ $lowonganPekerjaan->id }}">
                                    Lihat Detail
                                </button>
                            </div>
                        </article>
                    </div>

                    <!-- Modal (detail) -->
                    <div class="modal fade" id="modalLowonganPekerjaan{{ $lowonganPekerjaan->id }}" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="detail-job__company">
                                        <img src="{{ asset('asset/logo.png') }}" alt="Logo Perusahaan"
                                            class="detail-job__logo">
                                        <div>
                                            <h5 class="detail-job__title">{{ $lowonganPekerjaan->judul }}</h5>
                                            <div class="detail-job__company-name">{{ $lowonganPekerjaan->nama_perusahaan }}
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <a href="{{ asset('storage/' . $lowonganPekerjaan->gambar) }}" target="_blank"
                                        class="detail-job__image-container">
                                        <img src="{{ asset('storage/' . $lowonganPekerjaan->gambar) }}"
                                            alt="Gambar Lowongan: {{ $lowonganPekerjaan->judul }}">
                                    </a>

                                    <div class="detail-job__meta">
                                        <div><i class="bi bi-geo-alt-fill"></i> {{ $lowonganPekerjaan->lokasi }}</div>
                                        <div><i class="bi bi-briefcase-fill"></i> {{ $lowonganPekerjaan->tipe_pekerjaan }}
                                        </div>
                                        <div><i class="bi bi-clock-fill"></i> Diunggah
                                            {{ \Carbon\Carbon::parse($lowonganPekerjaan->tanggal_upload)->diffForHumans() }}
                                        </div>
                                    </div>

                                    <h6 class="detail-job__section-title">Deskripsi Pekerjaan</h6>
                                    <div class="detail-job__desc">
                                        {!! nl2br(e($lowonganPekerjaan->deskripsi)) !!}
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    @if ($lowonganPekerjaan->tautan_lamaran)
                                        <a href="{{ $lowonganPekerjaan->tautan_lamaran }}" target="_blank" rel="noopener"
                                            class="btn btn-primary"
                                            style="background-color: var(--ppka-primary); border-color: var(--ppka-primary);">
                                            <i class="bi bi-box-arrow-up-right"></i> Lamar Sekarang
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center p-5 bg-light rounded">
                            <p class="h5">Belum ada lowongan pekerjaan</p>
                            <p class="text-muted">Silakan cek kembali nanti.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

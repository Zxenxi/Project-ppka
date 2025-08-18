@extends('layouts.app')

@section('title', 'Home - Dashboard PPKA')

@section('content')
    <style>
        /* Global Theme Variables */
        :root {
            --ppka-primary: #f95f35;
            --ppka-primary-dark: #d94b24;
            --ppka-text: #2b2b2b;
            --ppka-muted: #727272;
            --ppka-soft: #fff7f3;
            --ppka-border: #e9e9e9;
            --r-lg: 16px;
            --r-md: 12px;
        }

        /* Hero Section */
        .hero-section {
            padding: 80px 0;
            background-color: #fdfdfd;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
        }

        .hero-section .highlight {
            color: var(--ppka-primary);
        }

        .hero-section .lead {
            font-size: 1.15rem;
            color: var(--ppka-muted);
        }

        .hero-section .btn-orange {
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 50px;
        }

        /* Latest Info Section */
        .latest-info-section {
            padding: 80px 0;
            background-color: #f9fafb;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .nav-pills .nav-link {
            color: var(--ppka-muted);
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 50px;
        }

        .nav-pills .nav-link.active {
            background-color: var(--ppka-primary);
            color: #fff;
        }

        /* NEW: Updated card style with image support */
        .info-card {
            background: #fff;
            border: 1px solid var(--ppka-border);
            border-radius: var(--r-md);
            text-decoration: none;
            transition: transform .2s ease, box-shadow .2s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            overflow: hidden;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .08);
        }

        .info-card__media {
            width: 100%;
            aspect-ratio: 16 / 10;
            background-color: #f0f0f0;
        }

        .info-card__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info-card__body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .info-card__title {
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--ppka-text);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: auto;
            /* Pushes meta to the bottom */
        }

        .info-card__meta {
            font-size: 0.9rem;
            color: var(--ppka-muted);
            padding-top: 1rem;
            margin-top: 1rem;
            border-top: 1px solid var(--ppka-border);
        }

        /* NEW: Style for the "View All" button */
        .btn-view-all {
            font-weight: 600;
            color: var(--ppka-primary);
            text-decoration: none;
            border: 2px solid var(--ppka-primary-soft);
            padding: 10px 25px;
            border-radius: 50px;
            transition: all .2s ease;
        }

        .btn-view-all:hover {
            background-color: var(--ppka-primary);
            color: #fff;
            border-color: var(--ppka-primary);
        }

        /* FAQ Section */
        .faq-section {
            padding: 80px 0;
        }

        .accordion-button:not(.collapsed) {
            background-color: var(--ppka-soft);
            color: var(--ppka-primary);
            box-shadow: none;
        }
    </style>

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0">
                    <h1>Wujudkan <span class="highlight">Masa Depan</span> Karier Impianmu</h1>
                    <p class="lead my-4">Pusat Pengembangan Karier (PPKA) hadir untuk mendampingi mahasiswa dan alumni dalam
                        meraih peluang kerja terbaik melalui layanan karier yang terintegrasi.</p>
                    <a href="{{ route('dashboard.lowongan-kerja') }}" class="btn btn-orange">Lihat Lowongan Kerja</a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('asset/backgroundhome.png') }}" class="img-fluid"
                        alt="Career Development Illustration" />
                </div>
            </div>
        </div>
    </section>

    <section class="latest-info-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Informasi Karir Terkini</h2>
                <p class="lead text-muted">Jangan lewatkan kesempatan terbaru dari berbagai kanal informasi kami.</p>
            </div>

            <ul class="nav nav-pills justify-content-center mb-5" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-jobs-tab" data-bs-toggle="pill" data-bs-target="#pills-jobs"
                        type="button" role="tab">Lowongan Kerja</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-guidance-tab" data-bs-toggle="pill" data-bs-target="#pills-guidance"
                        type="button" role="tab">Bimbingan Karir</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-hiring-tab" data-bs-toggle="pill" data-bs-target="#pills-hiring"
                        type="button" role="tab">Campus Hiring</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-jobs" role="tabpanel">
                    <div class="row g-4">
                        @forelse($latestJobs as $job)
                            <div class="col-lg-4 d-flex align-items-stretch">
                                {{-- NEW: Card is now a link and includes an image --}}
                                <a href="{{ route('dashboard.lowongan-kerja') }}" class="info-card">
                                    <div class="info-card__media">
                                        <img src="{{ asset('storage/' . $job->gambar) }}" class="info-card__img"
                                            alt="{{ $job->judul }}">
                                    </div>
                                    <div class="info-card__body">
                                        <h5 class="info-card__title">{{ $job->judul }}</h5>
                                        <p class="info-card__meta"><i class="bi bi-building"></i>
                                            {{ $job->nama_perusahaan }}</p>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p class="text-center text-muted col-12">Belum ada lowongan kerja terbaru.</p>
                        @endforelse
                    </div>
                    {{-- NEW: "View All" button added --}}
                    @if ($latestJobs->isNotEmpty())
                        <div class="text-center mt-5">
                            <a href="{{ route('dashboard.lowongan-kerja') }}" class="btn-view-all">Lihat Semua Lowongan <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="pills-guidance" role="tabpanel">
                    <div class="row g-4">
                        @forelse($latestGuidance as $item)
                            <div class="col-lg-4 d-flex align-items-stretch">
                                {{-- NEW: Card is now a link and includes an image --}}
                                <a href="{{ route('pengembangan-karir') }}" class="info-card">
                                    <div class="info-card__media">
                                        <img src="{{ asset('storage/' . $item->poster_image_path) }}" class="info-card__img"
                                            alt="{{ $item->title }}">
                                    </div>
                                    <div class="info-card__body">
                                        <h5 class="info-card__title">{{ $item->title }}</h5>
                                        <p class="info-card__meta"><i class="bi bi-calendar-event"></i>
                                            {{ $item->start_date ? $item->start_date->translatedFormat('d M Y') : 'Segera' }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p class="text-center text-muted col-12">Belum ada bimbingan karir terbaru.</p>
                        @endforelse
                    </div>
                    {{-- NEW: "View All" button added --}}
                    @if ($latestGuidance->isNotEmpty())
                        <div class="text-center mt-5">
                            <a href="{{ route('pengembangan-karir') }}" class="btn-view-all">Lihat Semua Bimbingan Karir <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="pills-hiring" role="tabpanel">
                    <div class="row g-4">
                        @forelse($latestHiring as $item)
                            <div class="col-lg-4 d-flex align-items-stretch">
                                {{-- NEW: Card is now a link and includes an image --}}
                                <a href="{{ route('campus-hiring') }}" class="info-card">
                                    <div class="info-card__media">
                                        <img src="{{ asset('storage/' . $item->poster_image_path) }}"
                                            class="info-card__img" alt="{{ $item->title }}">
                                    </div>
                                    <div class="info-card__body">
                                        <h5 class="info-card__title">{{ $item->title }}</h5>
                                        <p class="info-card__meta"><i class="bi bi-calendar-event"></i>
                                            {{ $item->start_date ? $item->start_date->translatedFormat('d M Y') : 'Segera' }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p class="text-center text-muted col-12">Belum ada campus hiring terbaru.</p>
                        @endforelse
                    </div>
                    {{-- NEW: "View All" button added --}}
                    @if ($latestHiring->isNotEmpty())
                        <div class="text-center mt-5">
                            <a href="{{ route('campus-hiring') }}" class="btn-view-all">Lihat Semua Campus Hiring <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <h2 class="section-title">Butuh Bantuan?</h2>
                    <p class="text-muted mb-4">Temukan jawaban dari pertanyaan umum tentang layanan PPKA. Jika Anda tidak
                        menemukannya, hubungi kami.</p>
                    <a href="{{ route('hubungi.index') }}" class="btn btn-orange"><i class="bi bi-chat-dots"></i>
                        Hubungi Kami</a>
                </div>
                <div class="col-lg-7">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq-1">Bagaimana cara mendaftar pelatihan
                                    karier?</button></h2>
                            <div id="faq-1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">Buka laman <em>Bimbingan Karir</em>, pilih jadwal yang
                                    tersedia, lalu klik tombol daftar dan ikuti petunjuknya. Notifikasi akan dikirim ke
                                    email Anda.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq-2">Apakah ada bimbingan pembuatan
                                    CV?</button></h2>
                            <div id="faq-2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">Ya, tersedia klinik CV mingguan dan template CV. Anda juga bisa
                                    menjadwalkan <em>review</em> 1:1 dengan konselor karier melalui layanan kami.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq-3">Bagaimana cara mendapatkan
                                    notifikasi lowongan?</button></h2>
                            <div id="faq-3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">Silakan kunjungi halaman <strong>Lowongan Kerja</strong> secara
                                    berkala. Fitur notifikasi personal akan segera kami kembangkan.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

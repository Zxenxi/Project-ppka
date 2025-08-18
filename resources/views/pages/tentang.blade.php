@extends('layouts.app')

@section('title', 'Tentang Kami - PPKA')

@section('content')
    <style>
        :root {
            --ppka-primary: #f95f35;
            --ppka-primary-dark: #d94b24;
            --ppka-text: #2b2b2b;
            --ppka-muted: #727280;
            --ppka-soft: #fff7f3;
            --ppka-border: #e9e9e9;
        }

        body {
            background-color: #f9fafb;
        }

        .section-padding {
            padding: 80px 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--ppka-text);
            margin-bottom: 1rem;
        }

        .lead-text {
            font-size: 1.15rem;
            color: var(--ppka-muted);
        }

        /* About Intro Section - Image size adjusted */
        .about-intro-img {
            border-radius: 16px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, .10);
            width: 100%;
            max-height: 450px;
            /* Controls the max height */
            height: auto;
            /* Maintains aspect ratio */
            object-fit: cover;
            display: block;
        }

        /* Visi & Misi Section */
        .visi-misi-section {
            background-color: #ffffff;
            border-top: 1px solid var(--ppka-border);
            border-bottom: 1px solid var(--ppka-border);
        }

        .visi-card {
            background: linear-gradient(135deg, var(--ppka-primary), var(--ppka-primary-dark));
            color: #fff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(249, 95, 53, .3);
            height: 100%;
        }

        .visi-card h3 {
            font-weight: 700;
        }

        .misi-list-item {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .misi-list-item .icon {
            font-size: 1.5rem;
            color: var(--ppka-primary);
            background-color: var(--ppka-soft);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .misi-list-item h5 {
            font-weight: 700;
            color: var(--ppka-text);
            margin-bottom: 0.25rem;
        }

        .misi-list-item p {
            color: var(--ppka-muted);
        }

        /* NEW: Styles for the Tugas & Fungsi Section */
        .fungsi-card {
            background-color: #fff;
            border: 1px solid var(--ppka-border);
            padding: 2rem;
            border-radius: 16px;
            height: 100%;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .fungsi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .08);
        }

        .fungsi-card .icon {
            font-size: 2rem;
            color: var(--ppka-primary);
            margin-bottom: 1rem;
        }

        .fungsi-card h5 {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .fungsi-card p {
            color: var(--ppka-muted);
            font-size: 0.95rem;
        }
    </style>

    <section class="section-padding">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('asset/logo_ppka.jpg') }}" alt="Tim PPKA UMPWR" class="about-intro-img">
                </div>
                <div class="col-lg-6">
                    <p class="text-uppercase fw-bold" style="color: var(--ppka-primary);">Pusat Pengembangan Karier & Alumni
                    </p>
                    <h1 class="section-title">Tentang PPKA UMPWR</h1>
                    <p class="lead-text">
                        Pusat Pengembangan Karier (PPKA) Universitas Muhammadiyah Purworejo adalah unit strategis yang
                        berkomitmen menjadi jembatan antara dunia pendidikan dan industri.
                    </p>
                    <p class="text-muted">
                        Kami bertujuan untuk membekali mahasiswa dan alumni dengan kompetensi yang relevan, mempersiapkan
                        mereka untuk menghadapi tantangan dunia kerja, dan membantu menciptakan lulusan yang siap bersaing
                        di era global serta mampu memberikan kontribusi nyata bagi masyarakat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding visi-misi-section">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="visi-card">
                        <h3><i class="bi bi-bullseye"></i> Visi Kami</h3>
                        <p class="mt-3">Menjadi pusat pengembangan karier dan penelusuran alumni yang unggul, profesional,
                            dan Islami untuk menghasilkan lulusan yang berdaya saing tinggi.</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h3><i class="bi bi-check2-circle"></i> Misi Kami</h3>
                    <div class="mt-4">
                        <div class="misi-list-item">
                            <div class="icon"><i class="bi bi-person-workspace"></i></div>
                            <div>
                                <h5>Layanan Karier Profesional</h5>
                                <p>Menyelenggarakan layanan konseling, pelatihan, dan bimbingan karier yang efektif dan
                                    mudah diakses.</p>
                            </div>
                        </div>
                        <div class="misi-list-item">
                            <div class="icon"><i class="bi bi-building-check"></i></div>
                            <div>
                                <h5>Kemitraan Industri</h5>
                                <p>Membangun dan memperluas jaringan kerjasama dengan dunia usaha dan industri untuk program
                                    magang, rekrutmen, dan campus hiring.</p>
                            </div>
                        </div>
                        <div class="misi-list-item">
                            <div class="icon"><i class="bi bi-graph-up-arrow"></i></div>
                            <div>
                                <h5>Tracer Study Berkelanjutan</h5>
                                <p>Melaksanakan tracer study secara periodik untuk evaluasi dan peningkatan kualitas lulusan
                                    serta kurikulum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Tugas & Fungsi PPKA</h2>
                <p class="lead-text">Secara operasional, kami bertanggung jawab untuk program-program berikut.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="fungsi-card">
                        <div class="icon"><i class="bi bi-info-circle"></i></div>
                        <h5>Pusat Informasi Karir</h5>
                        <p>Menyediakan informasi lowongan kerja, magang, dan peluang karir lainnya yang relevan bagi
                            mahasiswa dan alumni.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="fungsi-card">
                        <div class="icon"><i class="bi bi-lightbulb"></i></div>
                        <h5>Konseling & Bimbingan</h5>
                        <p>Memberikan layanan konsultasi individu maupun kelompok terkait perencanaan karir, pembuatan CV,
                            dan persiapan wawancara.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="fungsi-card">
                        <div class="icon"><i class="bi bi-mortarboard"></i></div>
                        <h5>Pelatihan & Workshop</h5>
                        <p>Mengadakan pelatihan soft skills dan hard skills yang dibutuhkan industri untuk meningkatkan
                            kesiapan kerja lulusan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- The "Layanan Kami" section has been removed --}}

@endsection

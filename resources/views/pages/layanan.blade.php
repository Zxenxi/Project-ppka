@extends('layouts.app')

@section('title', 'Layanan - Dashboard PPKA')

@section('content')
    <style>
        .section-layanan {
            padding: 40px 0;
            background: #fdf6f3;
        }

        .section-layanan h2 {
            font-weight: 700;
            color: #f95f35;
        }

        .layanan-card {
            background: #fff;
            padding: 30px 20px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .layanan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
        }

        .layanan-icon {
            font-size: 50px;
            color: #f95f35;
            margin-bottom: 15px;
        }

        .layanan-card h4 {
            font-weight: 600;
            color: #212529;
            margin-bottom: 10px;
        }

        .layanan-card p {
            color: #555;
            font-size: 15px;
            line-height: 1.6;
        }

        /* Responsive */
        @media (max-width: 767.98px) {
            .layanan-card {
                padding: 20px;
            }

            .layanan-icon {
                font-size: 40px;
            }
        }
    </style>

    <section class="section-layanan">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Layanan Kami</h2>
                <p class="text-muted">Kami menyediakan berbagai layanan untuk mendukung kesiapan karier mahasiswa dan alumni.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Tracer Study -->
                <div class="col-md-4">
                    <div class="layanan-card">
                        <i class="bi bi-graph-up-arrow layanan-icon"></i>
                        <h4>Tracer Study</h4>
                        <p>Kami melakukan tracer study secara rutin untuk mengetahui posisi dan persebaran alumni di dunia
                            kerja. Data ini penting untuk evaluasi kurikulum, metode pengajaran, serta akreditasi kampus.
                        </p>
                    </div>
                </div>

                <!-- Pelatihan Karier -->
                <div class="col-md-4">
                    <div class="layanan-card">
                        <i class="bi bi-person-video3 layanan-icon"></i>
                        <h4>Pelatihan Karier</h4>
                        <p>Pelatihan pembuatan CV, simulasi wawancara, dan pengembangan soft skill seperti komunikasi,
                            kepemimpinan, serta etika kerja untuk meningkatkan kesiapan mahasiswa.</p>
                    </div>
                </div>

                <!-- Informasi Lowongan Kerja -->
                <div class="col-md-4">
                    <div class="layanan-card">
                        <i class="bi bi-briefcase-fill layanan-icon"></i>
                        <h4>Informasi Lowongan Kerja</h4>
                        <p>Platform lowongan kerja terhubung dengan mitra perusahaan, termasuk job fair, campus hiring, dan
                            magang untuk memperluas peluang karier.</p>
                    </div>
                </div>

                <!-- Lembaga Sertifikasi Profesi -->
                <div class="col-md-4">
                    <div class="layanan-card">
                        <i class="bi bi-award-fill layanan-icon"></i>
                        <h4>Lembaga Sertifikasi Profesi</h4>
                        <p>Menyediakan layanan sertifikasi profesi bagi mahasiswa dan alumni untuk membuktikan kompetensi
                            sesuai standar industri dan meningkatkan daya saing.</p>
                    </div>
                </div>

                <!-- Campus Hiring -->
                <div class="col-md-4">
                    <div class="layanan-card">
                        <i class="bi bi-building-check layanan-icon"></i>
                        <h4>Campus Hiring</h4>
                        <p>Bekerjasama dengan berbagai perusahaan untuk mengadakan rekrutmen langsung di kampus, memberikan
                            kesempatan kerja yang lebih luas bagi mahasiswa dan alumni.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'Tracer Study Alumni')

@section('content')
<style>
    .tracer-hero {
        background: linear-gradient(to right, #f9f9f9, #e0e0e0);
        padding: 80px 0;
        text-align: center;
        border-bottom: 1px solid #eee;
    }
    .tracer-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }
    .tracer-hero p {
        font-size: 1.1rem;
        color: #666;
        max-width: 800px;
        margin: 0 auto 30px;
        line-height: 1.6;
    }
    .tracer-image-container {
        max-width: 600px;
        margin: 40px auto 0;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .tracer-image-container img {
        width: 100%;
        height: auto;
        display: block;
    }
    .tracer-content {
        padding: 60px 0;
        text-align: center;
    }
    .tracer-content .card {
        max-width: 700px;
        margin: 0 auto;
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        padding: 40px;
    }
    .tracer-content h2 {
        font-size: 2rem;
        color: #f95f35;
        margin-bottom: 20px;
    }
    .tracer-content p {
        font-size: 1rem;
        color: #555;
        line-height: 1.6;
        margin-bottom: 30px;
    }
    .tracer-content .btn-primary {
        background-color: #f95f35;
        border-color: #f95f35;
        padding: 12px 30px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 8px;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }
    .tracer-content .btn-primary:hover {
        background-color: #d94b24;
        border-color: #d94b24;
    }
    .tracer-empty-state {
        padding: 80px 0;
        text-align: center;
        color: #777;
    }
    .tracer-empty-state h3 {
        margin-bottom: 20px;
    }
</style>

<section class="tracer-hero">
    <div class="container">
        <h1>Tracer Study Alumni</h1>
        <p>Partisipasi Anda dalam Tracer Study sangat berarti bagi pengembangan program studi dan peningkatan kualitas lulusan. Mari berkontribusi untuk masa depan almamater!</p>
        <div class="tracer-image-container">
            <img src="{{ asset('asset/tracer.jpg') }}" alt="Tracer Study Illustration">
        </div>
    </div>
</section>

<section class="tracer-content">
    <div class="container">
        @if($activeTracer)
            <div class="card">
                <h2>{{ $activeTracer->title }}</h2>
                @if($activeTracer->description)
                    <p>{{ $activeTracer->description }}</p>
                @endif
                <a href="{{ $activeTracer->form_link }}" target="_blank" class="btn btn-primary">
                    <i class="bi bi-box-arrow-up-right me-2"></i> Mulai Isi Kuesioner
                </a>
            </div>
        @else
            <div class="tracer-empty-state">
                <h3><i class="bi bi-info-circle me-2"></i>Belum Ada Tracer Study Aktif</h3>
                <p>Saat ini belum ada kuesioner Tracer Study yang tersedia. Silakan cek kembali nanti.</p>
            </div>
        @endif
    </div>
</section>
@endsection
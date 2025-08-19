@extends('layouts.app')

@section('title', 'Pengembangan Karir - PPKA')

@section('content')
    <style>
        :root {
            --ppka-primary: #f95f35;
            /* Your orange theme color */
            --ppka-primary-soft: #fff4f0;
            --ppka-text: #2b2b2b;
            --ppka-muted: #888;
            --ppka-border: #e9e9e9;
            --card-shadow: 0 4px 16px rgba(0, 0, 0, .05);
            --card-shadow-hover: 0 8px 24px rgba(0, 0, 0, .1);
            --r-lg: 16px;
            --r-md: 12px;
        }

        body {
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--ppka-text);
        }

        .section-events {
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

        .event-card {
            background: #fff;
            border: 1px solid var(--ppka-border);
            border-radius: var(--r-lg);
            box-shadow: var(--card-shadow);
            transition: transform .2s ease, box-shadow .2s ease;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 100%;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow-hover);
        }

        .event-card__media {
            width: 100%;
            aspect-ratio: 1 / 1;
            /* aspect-ratio: 16 / 9; */
            background-color: #f0f0f0;
        }

        .event-card__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .event-card__body {
            padding: 18px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .event-card__badge {
            display: inline-block;
            background-color: var(--ppka-primary-soft);
            color: var(--ppka-primary);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .event-card__title {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0;
            flex-grow: 1;
        }

        .event-card__footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid var(--ppka-border);
            color: var(--ppka-muted);
            font-size: 0.85rem;
        }

        .modal-dialog {
            max-width: 900px;
        }

        .modal-content {
            border: 0;
            border-radius: var(--r-lg);
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-poster {
            border-radius: var(--r-md);
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
            transition: opacity .2s ease;
        }

        .modal-poster:hover {
            opacity: 0.85;
        }

        .modal-summary {
            background-color: #f9fafb;
            border-radius: var(--r-md);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .modal-summary__title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .modal-summary__meta {
            margin-bottom: 1.5rem;
        }

        .modal-summary__meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--ppka-muted);
            font-size: 0.9rem;
            margin-bottom: 0.75rem;
        }

        .modal-summary__meta-item i {
            color: var(--ppka-primary);
        }

        .modal-summary__button {
            text-align: center;
            width: 100%;
            padding: 14px;
            background-color: var(--ppka-primary);
            color: #fff;
            border: 0;
            border-radius: var(--r-md);
            font-weight: 700;
            font-size: 1rem;
            transition: background-color .2s ease;
            text-decoration: none;
        }

        .modal-summary__button:hover {
            background-color: #d94b24;
            color: #fff;
        }
    </style>

    <section class="section-events">
        <div class="container">
            <div class="section-header text-center">
                <h1 class="title">Pengembangan Karir</h1>
                <p class="subtitle">Temukan berbagai webinar dan pelatihan online untuk meningkatkan potensi karir Anda.</p>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 justify-content-center">
                @forelse($BimbinganKarir as $item)
                    <div class="col">
                        <article class="event-card" role="button" data-bs-toggle="modal"
                            data-bs-target="#modalPengembanganKarir{{ $item->id }}">
                            <div class="event-card__media">
                                <img class="event-card__img" src="{{ asset('storage/' . $item->poster_image_path) }}"
                                    alt="{{ $item->title }}">
                            </div>
                            <div class="event-card__body">
                                <div>
                                    <span class="event-card__badge">{{ $item->kategori }}</span>
                                </div>
                                <h3 class="event-card__title">{{ $item->title }}</h3>
                                <div class="event-card__footer">
                                    <span>
                                        <i class="bi bi-calendar3"></i>
                                        @if ($item->start_date)
                                            {{ $item->start_date->translatedFormat('d M Y') }}
                                        @else
                                            Coming Soon
                                        @endif
                                    </span>
                                    <span>Lihat Detail <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="modal fade modal-fullscreen" id="modalPengembanganKarir{{ $item->id }}" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close"
                                        style="position: absolute; top: 1rem; right: 1rem; z-index: 2;"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="row g-4" style="height: 100%;">
                                        <div class="col-lg-7" style="height: 100%;">
                                            <a href="{{ asset('storage/' . $item->poster_image_path) }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <img src="{{ asset('storage/' . $item->poster_image_path) }}"
                                                    alt="Poster: {{ $item->title }}" class="modal-poster">
                                            </a>
                                        </div>
                                        <div class="col-lg-5" style="height: 100%;">
                                            <div class="modal-summary">
                                                <h3 class="modal-summary__title">{{ $item->title }}</h3>
                                                <div class="modal-summary__meta">
                                                    <div class="modal-summary__meta-item">
                                                        <i class="bi bi-info-circle-fill"></i>
                                                        <span>Event {{ $item->kategori }}</span>
                                                    </div>
                                                    <div class="modal-summary__meta-item">
                                                        <i class="bi bi-calendar-event-fill"></i>
                                                        <span>
                                                            @if ($item->start_date && $item->end_date)
                                                                {{ $item->start_date->translatedFormat('d M Y') }} -
                                                                {{ $item->end_date->translatedFormat('d M Y') }}
                                                            @elseif($item->start_date)
                                                                {{ $item->start_date->translatedFormat('d F Y') }}
                                                            @else
                                                                Tanggal akan diumumkan
                                                            @endif
                                                        </span>
                                                    </div>
                                                    {{-- NEW: Added the posting time back --}}
                                                    <div class="modal-summary__meta-item">
                                                        <i class="bi bi-clock-fill"></i>
                                                        <span>Diposting {{ $item->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                                <div
                                                    style="color: #555; font-size: 0.95rem; line-height: 1.6; flex-grow: 1; overflow-y: auto;">
                                                    {!! nl2br(e($item->description)) !!}
                                                </div>
                                                <div class="d-flex gap-2 mt-3">
                                                    <a href="{{ $item->registration_link }}" target="_blank" rel="noopener"
                                                        class="modal-summary__button flex-grow-1">
                                                        Daftar Sekarang
                                                    </a>
                                                    <button type="button" class="btn btn-light copy-link-btn"
                                                        data-link="{{ url()->current() }}" title="Copy page link">
                                                        <i class="bi bi-share-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center p-5 bg-light rounded">
                            <p class="h5">Belum ada agenda pengembangan karir</p>
                            <p class="text-muted">Silakan cek kembali nanti.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyButtons = document.querySelectorAll('.copy-link-btn');

            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const linkToCopy = this.dataset.link;
                    navigator.clipboard.writeText(linkToCopy).then(() => {
                        const originalIcon = this.innerHTML;
                        this.innerHTML = '<i class="bi bi-check-lg"></i>';
                        this.disabled = true;
                        setTimeout(() => {
                            this.innerHTML = originalIcon;
                            this.disabled = false;
                        }, 2000);
                    }).catch(err => {
                        console.error('Failed to copy: ', err);
                        alert('Failed to copy link.');
                    });
                });
            });
        });
    </script>
@endpush

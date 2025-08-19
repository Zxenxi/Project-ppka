<style>
    :root {
        --primary-color: #f15a24;
        --text-dark: #333;
    }

    .navbar {
        background-color: #ffffff;
    }

    .navbar-brand img {
        height: 40px;
    }

    .navbar-nav .nav-link {
        font-weight: 600;
        color: var(--text-dark);
        padding: 10px 15px;
        transition: all 0.3s ease;
        border-radius: 5px;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus,
    .navbar-nav .nav-link.active {
        color: #fff;
        background-color: var(--primary-color);
    }

    .dropdown-menu {
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .btn-orange {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 8px 16px;
        font-weight: 600;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .btn-orange:hover {
        background-color: #d94b24;
        color: white;
    }
</style>

<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('asset/logo.png') }}" alt="Logo PPKA" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}"
                        href="{{ route('tentang') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('layanan') ? 'active' : '' }}"
                        href="{{ route('layanan') }}">Layanan</a>
                </li>
                <li class="nav-item dropdown">
                    {{-- Updated active state logic to include all career pages --}}
                    <a class="nav-link dropdown-toggle {{ request()->is('lowongan-kerja*', 'tracer*', 'pengembangan-karir*', 'campus-hiring*') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Karir & Pengembangan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->is('lowongan-kerja') ? 'active' : '' }}"
                                href="{{ route('dashboard.lowongan-kerja') }}">Lowongan Kerja</a></li>
                        <li><a class="dropdown-item {{ request()->is('tracer') ? 'active' : '' }}"
                                href="{{ route('tracer.index') }}">Tracer Study</a></li>
                        <li><a class="dropdown-item {{ request()->is('pengembangan-karir') ? 'active' : '' }}"
                                href="{{ route('pengembangan-karir') }}">Bimbingan Karir</a></li>
                        {{-- UPDATED: Added the correct route and active state --}}
                        <li><a class="dropdown-item {{ request()->is('campus-hiring') ? 'active' : '' }}"
                                href="{{ route('campus-hiring') }}">Campus Hiring</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-block d-lg-block ms-lg-3 pt-1">
                <a class="btn btn-orange {{ request()->is('hubungi') ? 'active' : '' }}"
                    href="{{ route('hubungi.index') }}">Contact Us</a>
            </div>
        </div>
    </div>
</nav>

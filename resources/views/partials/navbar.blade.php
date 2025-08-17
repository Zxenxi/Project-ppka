<style>
  .navbar {
    background-color: #ffffff;
  }

  .navbar-brand img {
    height: 40px;
  }

  .navbar-nav .nav-link {
    font-weight: 600;
    color: var(--text-dark);
  }

  .navbar-nav .nav-link:hover {
    color: var(--primary-color);
  }

  .btn-orange {
    background-color: var(--primary-color);
    color: white;
    border: none;
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

    <!-- Toggler mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

<div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <!-- Menu utama -->
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('tentang') }}">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('layanan') }}">Layanan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.berita') }}">Lowongan Kerja</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.berita') }}">Lowongan Kerja</a></li>
        <!--<li class="nav-item"><a class="nav-link" href="{{ route('hubungi.index') }}">Hubungi Kami</a></li>-->
      </ul>

      <!-- Button pojok kanan hanya di desktop -->
      <div class="d-lg-block ms-lg-3">
        <a class="btn btn-orange" href="#">Contact Us</a>
      </div>
    </div>
  </div>
</nav>

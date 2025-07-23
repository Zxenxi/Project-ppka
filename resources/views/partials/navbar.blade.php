<head>
  <link rel="stylesheet" href="{{ asset('asset/css/navbar.css') }}">
</head>
<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('asset/logo.png') }}" alt="Logo PPKA" /></a>
    
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav me-3">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('tentang') }}">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('layanan') }}">Layanan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.berita') }}">Lowongan Kerja</a></li>
        <!--<li class="nav-item"><a class="nav-link" href="{{ route('tracer.create')}}">Tracer Studi</a></li>-->
        <li class="nav-item"><a class="nav-link" href="{{ route('hubungi.index') }}">Hubungi Kami</a></li>
      </ul>
    </div>
    <a class="btn btn-orange" href="#">Contact Us</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
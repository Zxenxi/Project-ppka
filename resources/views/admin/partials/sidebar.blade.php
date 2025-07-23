<style>
  /* Sidebar Styling */
  .sidebar {
    min-width: 250px;
    background-color: #343a40;
    color: white;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    padding-top: 30px;
    z-index: 10;
    transition: all 0.3s ease;
  }

  .sidebar .nav-link {
    padding: 12px 20px;
    border-radius: 0;
    font-weight: 500;
    transition: background-color 0.3s, padding-left 0.3s;
  }

  .sidebar .nav-link:hover {
    background-color: #e64a19;
    padding-left: 25px;
  }

  .sidebar .nav-link i {
    margin-right: 10px;
  }

  .btn-orange {
    background-color: #f95f35;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    transition: background-color 0.3s ease;
  }

  .btn-orange:hover {
    background-color: #d94b24;
    color: white;
  }

  .logo {
    display: block;
    margin: 0 auto 20px;
    max-width: 100px;
    height: auto;
  }
</style>

<!-- Sidebar -->
<div class="sidebar d-flex flex-column p-3" id="sidebar">
  <!-- Logo -->
  <img src="{{ asset('asset/logo.png') }}" alt="Logo" class="logo">
  <!-- Ganti '/path/to/logo.png' dengan path logo yang sesuai -->

  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="{{ route('admin.dashboard') }}" class="nav-link text-white menu-item">
        <i class="bi bi-speedometer2"></i> Dashboard
      </a>
    </li>
    <li>
      <a href="{{ route('berita.create') }}" class="nav-link text-white menu-item">
        <i class="bi bi-newspaper"></i> Berita
      </a>
    </li>
    <li>
      <a href="{{ route('hubungi.admin') }}" class="nav-link text-white menu-item">
        <i class="bi bi-envelope"></i> Pesan Masuk
      </a>
    </li>
  </ul>
  <hr class="text-white">
  <a href="{{ route('logout') }}" class="btn btn-orange w-100">
    <i class="bi bi-box-arrow-right"></i> Logout
  </a>
</div>

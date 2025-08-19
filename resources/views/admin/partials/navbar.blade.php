<style>
  .navbar-custom {
    background-color: #ffffff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    padding: 10px 20px;
    position: fixed;
    top: 0;
    right: 0;
    left: 0; /* Changed to 0, content-area will handle margin */
    z-index: 1000;
    transition: left 0.3s;
  }

  @media (min-width: 768px) { /* Adjust for larger screens */
    .navbar-custom {
      left: 250px; /* On larger screens, position next to sidebar */
    }
  }

  .navbar-custom .nav-link {
    color: #343a40;
    font-weight: 500;
    transition: color 0.3s;
  }

  .navbar-custom .nav-link:hover {
    color: #e64a19;
  }

  .navbar-custom h5 {
    margin: 0;
    color: #343a40;
    font-weight: 600;
  }

  .btn-toggle-sidebar {
    background-color: transparent;
    border: none;
    color: #343a40;
    font-size: 1.25rem;
  }

  .btn-toggle-sidebar:hover {
    color: #e64a19;
  }
</style>

<nav class="navbar navbar-custom">
  <div class="container-fluid d-flex align-items-center justify-content-between">
    <!-- Toggle for mobile -->
    <button class="btn btn-toggle-sidebar sidebar-toggle" type="button">
      <i class="bi bi-list"></i>
    </button>

    <!-- Title -->
    <h5 class="ms-3">Admin Dashboard</h5>

    <!-- Logout button -->
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
          <i class="bi bi-box-arrow-right"></i> Logout
        </a>
      </li>
    </ul>
  </div>
</nav>

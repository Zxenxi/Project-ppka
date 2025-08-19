<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      margin: 0;
      background-color: #f8f9fa;
    }

    /* Sidebar Styling */
    .sidebar {
      min-width: 250px;
      background-color: #343a40;
      color: white;
      height: 100vh;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      padding-top: 30px;
      z-index: 10;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 12px 20px;
      transition: background-color 0.3s;
    }

    .sidebar a:hover {
      background-color: #e64a19;
    }

    .sidebar .menu-item i {
      margin-right: 10px;
    }

    /* Content Area */
    .content-area {
      flex: 1;
      display: flex;
      flex-direction: column;
      padding-top: 80px; /* To prevent navbar overlap */
      transition: margin-left 0.3s;
    }

    /* Navbar Styling */
    .navbar {
      background-color: #ffffff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 10px 20px;
      z-index: 5;
    }

    /* Main Content Area */
    main {
      flex: 1;
      padding: 20px;
      background-color: #f8f9fa;
      min-height: calc(100vh - 120px); /* Ensure the main content area stretches properly */
    }

    /* Footer Styling */
    footer {
      background-color: #343a40;
      color: white;
      padding: 15px;
      text-align: center;
    }

    /* Responsive adjustments */
    @media (min-width: 769px) { /* For larger screens */
      .sidebar {
        left: 0; /* Sidebar always visible on larger screens */
      }
      .content-area {
        margin-left: 250px; /* Content shifted for sidebar */
      }
    }

    @media (max-width: 768px) { /* For smaller screens */
      .sidebar {
        position: fixed;
        left: -250px; /* Hide sidebar by default */
        transition: left 0.3s;
      }

      .sidebar.active {
        left: 0; /* Show sidebar when active */
      }

      .content-area {
        margin-left: 0; /* Content takes full width */
      }

      .navbar .d-flex {
        width: 100%;
        justify-content: space-between;
      }
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  @include('admin.partials.sidebar')

  <div class="content-area">
    <!-- Navbar -->
    @include('admin.partials.navbar')

    <!-- Main Content -->
    <main>
      @yield('content')
    </main>

    <!-- Footer -->
    @include('admin.partials.footer')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const sidebar = document.querySelector('.sidebar');
      const toggleButton = document.querySelector('.sidebar-toggle');

      // Ensure sidebar is hidden on small screens on load
      if (window.innerWidth <= 768) {
        sidebar.classList.remove('active'); // Ensure it's not active by default on small screens
      }

      // Toggle button click event
      if (toggleButton) {
        toggleButton.addEventListener('click', function () {
          sidebar.classList.toggle('active');
        });
      }

      // Optional: Hide sidebar when a modal is shown (if it's interfering)
      const modals = document.querySelectorAll('.modal');
      modals.forEach(modal => {
        modal.addEventListener('show.bs.modal', function () {
          if (window.innerWidth <= 768) {
            sidebar.classList.remove('active');
          }
        });
      });

      // Optional: Hide sidebar when a navigation link is clicked (if not a full page reload)
      const sidebarLinks = document.querySelectorAll('.sidebar a');
      sidebarLinks.forEach(link => {
        link.addEventListener('click', function () {
          if (window.innerWidth <= 768) {
            sidebar.classList.remove('active');
          }
        });
      });
    });
  </script>
</body>
</html>

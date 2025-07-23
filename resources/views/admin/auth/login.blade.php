<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - PPKA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .login-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
      background: white;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #fd7e14;
    }

    .btn-orange {
      background-color: #fd7e14;
      color: white;
    }

    .btn-orange:hover {
      background-color: #e96a05;
    }

    .login-logo {
      width: 100px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="login-container">
  <div class="col-md-4">
    <div class="login-card text-center">
      <img src="{{ asset('asset/logo.png') }}" alt="Logo" class="login-logo">

      <h4 class="mb-4">Login ke Admin PPKA</h4>

      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3 text-start">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="email" required>
        </div>

        <div class="mb-3 text-start">
          <label for="password" class="form-label">Kata Sandi</label>
          <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <button type="submit" class="btn btn-orange w-100">Masuk</button>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

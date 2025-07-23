@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<style>
  .card-hover {
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: pointer;
    border: none;
    border-radius: 12px;
  }

  .card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
  }

  .icon-circle {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 10px auto;
    font-size: 28px;
  }

  .icon-blue {
    background-color: #e3f2fd;
    color: #0d6efd;
  }

  .icon-green {
    background-color: #e6f4ea;
    color: #198754;
  }
</style>

<div class="container mt-1">
  <h3 class="text-center fw-bold mb-2">Selamat Datang, Admin</h3>
  <p class="text-muted text-center">Gunakan menu di samping untuk mengelola konten situs.</p>

  <div class="row mt-5">
    <div class="col-md-6 mb-4">
      <a href="#" class="text-decoration-none text-dark">
        <div class="card card-hover shadow-sm p-4">
          <div class="card-body text-center">
            <div class="icon-circle icon-blue">
              <i class="bi bi-newspaper"></i>
            </div>
            <h5 class="mt-3 fw-semibold">Kelola Berita</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-6 mb-4">
      <a href="#" class="text-decoration-none text-dark">
        <div class="card card-hover shadow-sm p-4">
          <div class="card-body text-center">
            <div class="icon-circle icon-green">
              <i class="bi bi-envelope"></i>
            </div>
            <h5 class="mt-3 fw-semibold">Pesan Masuk</h5>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
@endsection

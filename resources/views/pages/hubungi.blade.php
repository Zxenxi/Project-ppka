@extends('layouts.app')

@section('title', 'Hubungi - Dashboard PPKA')

@section('content')
<home>
  <link rel="stylesheet" href="{{ asset('asset/css/hubungi.css') }}">
</home>

<section class="contact-section py-5">
  <div class="container">
    <div class="row align-items-center g-5">
      
      <!-- Gambar -->
      <div class="col-md-6">
        <img src="{{ asset('asset/backgroundhome.png') }}" class="img-fluid rounded" alt="Contact Image">
      </div>

      <!-- Form -->
      <div class="col-md-6">
        <div class="contact-form">
          <h3 class="mb-4">Hubungi Kami</h3>

          <!-- Notifikasi Sukses -->
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <!-- Formulir -->
          <form action="{{ route('hubungi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="pesan" class="form-label">Pesan</label>
              <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-orange">Kirim Pesan</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection

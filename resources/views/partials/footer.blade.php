<style>
  .footer {
  background-color: #ffffff;
  padding: 40px 0;
  border-top: 1px solid #dee2e6;
  color: var(--text-muted);
}

.footer a {
  color: var(--text-dark);
  text-decoration: none;
}

.footer a:hover {
  color: var(--primary-color);
}
</style>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <img src="{{ asset('asset/logo.png') }}" alt="Logo PPKA" style="height: 50px;" class="mb-2" />
        <p class="text-black">Pusat Pengembangan Karier membantu mahasiswa dan alumni dalam meraih karier impian mereka.</p>
      </div>
      <div class="col-md-4 mb-3">
        <h5 class="text-black">Menu</h5>
        <ul class="list-unstyled">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
          <li><a href="{{ route('layanan') }}">Layanan</a></li>
          <li><a href="{{ route('hubungi.index') }}">Hubungi Kami</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-3">
        <h5 class="text-black">Follow Us</h5>
        <a href="#" class="me-3 fs-5"><i class="bi bi-facebook"></i></a>
        <a href="#" class="me-3 fs-5"><i class="bi bi-instagram"></i></a>
        <a href="#" class="me-3 fs-5"><i class="bi bi-twitter"></i></a>
      </div>
    </div>
    <div class="text-center text-black mt-3">
      <p class="mb-0">© 2023 Copyright by S Developers. All rights reserved.</p>
    </div>
  </div>
</footer>
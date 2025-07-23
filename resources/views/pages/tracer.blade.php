@extends('layouts.app') {{-- Layout utama non-admin --}}

@section('title', 'Tracer Studi')

@section('content')
<body>
    

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-orange text-white text-center rounded-top-4">
                    <h3 class="mb-0"><i class="bi bi-pen-fill me-2"></i>Formulir Tracer Studi</h3>
                </div>
                <div class="card-body p-4">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('tracer.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="mb-3">
                            <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                            <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" min="2000" max="{{ date('Y') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Aktif</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No. HP / WA</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status Sekarang</label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="" disabled selected>-- Pilih Status --</option>
                                <option value="Bekerja">Bekerja</option>
                                <option value="Wirausaha">Wirausaha</option>
                                <option value="Melanjutkan Studi">Melanjutkan Studi</option>
                                <option value="Belum Bekerja">Belum Bekerja</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="instansi" class="form-label">Nama Instansi / Perusahaan / Kampus (opsional)</label>
                            <input type="text" class="form-control" id="instansi" name="instansi">
                        </div>

                        <div class="mb-4">
                            <label for="pesan" class="form-label">Saran / Pesan untuk Kampus (opsional)</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="4"></textarea>
                        </div>

                        <button type="submit" class="btn btn-orange w-100 py-2 fs-5">
                            <i class="bi bi-send-fill me-2"></i>Kirim
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
<style>
    .bg-orange {
        background-color: #fd7e14 !important;
    }

    .btn-orange {
        background-color: #fd7e14;
        color: white;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-orange:hover {
        background-color: #e96b0a;
    }

    .card {
        border: none;
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    }
    body {
        background: linear-gradient(to right, #ffffff, var(--secondary-color));
    }


</style>
@endsection

@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<style>
    .text-orange {
        color: #fd7e14;
    }

    .btn-orange {
        background-color: #fd7e14;
        color: #fff;
        border: none;
    }

    .btn-orange:hover {
        background-color: #e96b0a;
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Berita</h2>
        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formTambahBeritaModal">
            <i class="bi bi-plus-circle"></i> Tambah Berita
        </a>
    </div>

    <!-- Tampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Modal Tambah Berita -->
    <div class="modal fade" id="formTambahBeritaModal" tabindex="-1" aria-labelledby="formTambahBeritaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formTambahBeritaModalLabel">Tambah Berita Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Berita</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_upload" class="form-label">Tanggal Upload</label>
                            <input type="datetime-local" class="form-control" id="tanggal_upload" name="tanggal_upload" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Berita</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Berita -->
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $index => $berita)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ Str::limit($berita->deskripsi, 50) }}</td>
                        <td><img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" width="100"></td>
                        <td>{{ \Carbon\Carbon::parse($berita->tanggal_upload)->format('d M Y H:i') }}</td>
                        <td>
                            <!-- Modal untuk Edit Berita -->
                            <a href="#" class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#formEditBeritaModal{{ $berita->id }}">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            
                            <!-- Modal Edit Berita -->
                            <div class="modal fade" id="formEditBeritaModal{{ $berita->id }}" tabindex="-1" aria-labelledby="formEditBeritaModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="formEditBeritaModalLabel">Edit Berita</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="judul" class="form-label">Judul Berita</label>
                                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ $berita->deskripsi }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gambar" class="form-label">Gambar Berita</label>
                                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggal_upload" class="form-label">Tanggal Upload</label>
                                                    <input type="datetime-local" class="form-control" id="tanggal_upload" name="tanggal_upload" value="{{ \Carbon\Carbon::parse($berita->tanggal_upload)->format('Y-m-d\TH:i') }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Hapus Berita -->
                            <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

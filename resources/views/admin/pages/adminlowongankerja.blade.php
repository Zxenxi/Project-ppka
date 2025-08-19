@extends('admin.layouts.app')

@section('title', 'Dashboard Admin - Lowongan Pekerjaan')

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
    .modal-dialog {
        max-width: 700px;
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Lowongan Pekerjaan</h2>
        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formTambahLowonganPekerjaanModal">
            <i class="bi bi-plus-circle"></i> Tambah Lowongan Pekerjaan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Modal Tambah Lowongan Pekerjaan -->
    <div class="modal fade" id="formTambahLowonganPekerjaanModal" tabindex="-1" aria-labelledby="formTambahLowonganPekerjaanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formTambahLowonganPekerjaanModalLabel">Tambah Lowongan Pekerjaan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lowongan-kerja.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Lowongan</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tipe_pekerjaan" class="form-label">Tipe Pekerjaan</label>
                                    <select class="form-select" id="tipe_pekerjaan" name="tipe_pekerjaan" required>
                                        <option value="Full-time">Full-time</option>
                                        <option value="Part-time">Part-time</option>
                                        <option value="Magang">Magang</option>
                                        <option value="Kontrak">Kontrak</option>
                                        <option value="Freelance">Freelance</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tautan_lamaran" class="form-label">Tautan Lamaran (Opsional)</label>
                            <input type="url" class="form-control" id="tautan_lamaran" name="tautan_lamaran" placeholder="https://example.com/karir">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar Utama</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal_upload" class="form-label">Tanggal Upload</label>
                                    <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Lowongan Pekerjaan -->
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Perusahaan</th>
                    <th>Tipe</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lowonganPekerjaans as $index => $lowonganPekerjaan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $lowonganPekerjaan->judul }}</td>
                        <td>{{ $lowonganPekerjaan->nama_perusahaan }}</td>
                        <td><span class="badge bg-secondary">{{ $lowonganPekerjaan->tipe_pekerjaan }}</span></td>
                        <td>{{ $lowonganPekerjaan->lokasi }}</td>
                        <td>
                            <td>
                            <div class="d-flex flex-column flex-md-row gap-2">
                                <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#formEditLowonganPekerjaanModal{{ $lowonganPekerjaan->id }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                
                                <!-- Modal Edit Lowongan Pekerjaan -->
                                <div class="modal fade" id="formEditLowonganPekerjaanModal{{ $lowonganPekerjaan->id }}" tabindex="-1" aria-labelledby="formEditLowonganPekerjaanModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="formEditLowonganPekerjaanModalLabel">Edit Lowongan Pekerjaan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('lowongan-kerja.update', $lowonganPekerjaan->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="judul" class="form-label">Judul Lowongan</label>
                                                                <input type="text" class="form-control" id="judul" name="judul" value="{{ $lowonganPekerjaan->judul }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $lowonganPekerjaan->nama_perusahaan }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="lokasi" class="form-label">Lokasi</label>
                                                                <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $lowonganPekerjaan->lokasi }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="tipe_pekerjaan" class="form-label">Tipe Pekerjaan</label>
                                                                <select class="form-select" id="tipe_pekerjaan" name="tipe_pekerjaan" required>
                                                                    <option value="Full-time" {{ $lowonganPekerjaan->tipe_pekerjaan == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                                                    <option value="Part-time" {{ $lowonganPekerjaan->tipe_pekerjaan == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                                                    <option value="Magang" {{ $lowonganPekerjaan->tipe_pekerjaan == 'Magang' ? 'selected' : '' }}>Magang</option>
                                                                    <option value="Kontrak" {{ $lowonganPekerjaan->tipe_pekerjaan == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                                                                    <option value="Freelance" {{ $lowonganPekerjaan->tipe_pekerjaan == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ $lowonganPekerjaan->deskripsi }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tautan_lamaran" class="form-label">Tautan Lamaran (Opsional)</label>
                                                        <input type="url" class="form-control" id="tautan_lamaran" name="tautan_lamaran" value="{{ $lowonganPekerjaan->tautan_lamaran }}" placeholder="https://example.com/karir">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="gambar" class="form-label">Gambar Utama (Kosongkan jika tidak diubah)</label>
                                                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="tanggal_upload" class="form-label">Tanggal Upload</label>
                                                                <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload" value="{{ \Carbon\Carbon::parse($lowonganPekerjaan->tanggal_upload)->format('Y-m-d') }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('lowongan-kerja.destroy', $lowonganPekerjaan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada lowongan pekerjaan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

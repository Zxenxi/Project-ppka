@extends('admin.layouts.app')

@section('title', 'Admin - Tracer Study')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manajemen Tracer Study</h2>
        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formTambahTracerModal">
            <i class="bi bi-plus-circle"></i> Tambah Tracer Study
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Modal Tambah Tracer Study -->
    <div class="modal fade" id="formTambahTracerModal" tabindex="-1" aria-labelledby="formTambahTracerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formTambahTracerModalLabel">Tambah Tracer Study Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.tracer.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Tracer Study</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Singkat (Opsional)</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="form_link" class="form-label">Link Google Form</label>
                            <input type="url" class="form-control" id="form_link" name="form_link" placeholder="https://forms.gle/yourformlink" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1">
                            <label class="form-check-label" for="is_active">Aktifkan Tracer Study Ini (Hanya satu yang bisa aktif)</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Tracer Study -->
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Link Form</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tracers as $index => $tracer)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tracer->title }}</td>
                        <td><a href="{{ $tracer->form_link }}" target="_blank">Link Form</a></td>
                        <td>
                            @if($tracer->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#formEditTracerModal{{ $tracer->id }}">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            
                            <!-- Modal Edit Tracer Study -->
                            <div class="modal fade" id="formEditTracerModal{{ $tracer->id }}" tabindex="-1" aria-labelledby="formEditTracerModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="formEditTracerModalLabel">Edit Tracer Study</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.tracer.update', $tracer->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Judul Tracer Study</label>
                                                    <input type="text" class="form-control" id="title" name="title" value="{{ $tracer->title }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Deskripsi Singkat (Opsional)</label>
                                                    <textarea class="form-control" id="description" name="description" rows="3">{{ $tracer->description }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="form_link" class="form-label">Link Google Form</label>
                                                    <input type="url" class="form-control" id="form_link" name="form_link" value="{{ $tracer->form_link }}" placeholder="https://forms.gle/yourformlink" required>
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ $tracer->is_active ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="is_active">Aktifkan Tracer Study Ini (Hanya satu yang bisa aktif)</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('admin.tracer.destroy', $tracer->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus Tracer Study ini?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                            @if(!$tracer->is_active)
                            <form action="{{ route('admin.tracer.toggleActive', $tracer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-sm btn-info">
                                    <i class="bi bi-check-circle"></i> Aktifkan
                                </button>
                            </form>
                            @else
                            <form action="{{ route('admin.tracer.toggleActive', $tracer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-sm btn-secondary">
                                    <i class="bi bi-x-circle"></i> Nonaktifkan
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada Tracer Study yang ditambahkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

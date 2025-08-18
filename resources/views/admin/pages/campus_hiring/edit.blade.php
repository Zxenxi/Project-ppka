@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Data Campus Hiring</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.campus-hiring.update', $campusHiring->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="title">Judul Acara (Opsional)</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title', $campusHiring->title) }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="5" required>{{ old('description', $campusHiring->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="registration_link">Link Pendaftaran</label>
                        <input type="url" class="form-control @error('registration_link') is-invalid @enderror"
                            id="registration_link" name="registration_link"
                            value="{{ old('registration_link', $campusHiring->registration_link) }}" required>
                        @error('registration_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="poster_image_path">Poster (Biarkan kosong jika tidak ingin mengubah)</label>
                        <input type="file" class="form-control @error('poster_image_path') is-invalid @enderror"
                            id="poster_image_path" name="poster_image_path">
                        <img src="{{ asset('storage/' . $campusHiring->poster_image_path) }}" alt="Poster Saat Ini"
                            width="150" class="img-thumbnail mt-2">
                        @error('poster_image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="kategori">Kategori Acara</label>
                                <select class="form-select @error('kategori') is-invalid @enderror" id="kategori"
                                    name="kategori" required>
                                    <option value="Online"
                                        {{ old('kategori', $campusHiring->kategori) == 'Online' ? 'selected' : '' }}>Online
                                    </option>
                                    <option value="Offline"
                                        {{ old('kategori', $campusHiring->kategori) == 'Offline' ? 'selected' : '' }}>
                                        Offline</option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="start_date">Tanggal Mulai (Opsional)</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    id="start_date" name="start_date"
                                    value="{{ old('start_date', optional($campusHiring->start_date)->format('Y-m-d')) }}">
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="end_date">Tanggal Selesai (Opsional)</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    id="end_date" name="end_date"
                                    value="{{ old('end_date', optional($campusHiring->end_date)->format('Y-m-d')) }}">
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                    <a href="{{ route('admin.campus-hiring.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection

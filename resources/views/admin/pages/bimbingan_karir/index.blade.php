@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manajemen Bimbingan Karir</h1>
            <a href="{{ route('admin.bimbingan-karir.create') }}" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-lg"></i> Tambah Data Baru
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">Poster</th>
                                <th>Judul</th>
                                <th class="text-center">Kategori</th>
                                <th>Tanggal Acara</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($BimbinganKarir as $item)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <img src="{{ asset('storage/' . $item->poster_image_path) }}" alt="Poster"
                                            style="width: 120px; height: auto; border-radius: 5px;">
                                    </td>
                                    <td style="vertical-align: middle;">{{ $item->title ?? 'N/A' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        {{-- CORRECTED: Updated to Bootstrap 5 badge classes and added 'text-dark' for readability --}}
                                        <span
                                            class="badge rounded-pill fs-6 {{ $item->kategori == 'Online' ? 'bg-info' : 'bg-warning text-dark' }}">
                                            {{ $item->kategori }}
                                        </span>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        @if ($item->start_date && $item->end_date)
                                            {{ $item->start_date->format('d M Y') }} -
                                            {{ $item->end_date->format('d M Y') }}
                                        @elseif($item->start_date)
                                            {{ $item->start_date->format('d M Y') }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a href="{{ route('admin.bimbingan-karir.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm" title="Edit">
                                            {{-- CORRECTED: Replaced Font Awesome with the correct Bootstrap Icons --}}
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.bimbingan-karir.destroy', $item->id) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                {{-- CORRECTED: Replaced Font Awesome with the correct Bootstrap Icons --}}
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

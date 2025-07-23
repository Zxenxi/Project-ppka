@extends('admin.layouts.app')

@section('title', 'Pesan Masuk')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Pesan Masuk</h2>

    <!-- Tampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Tanggal Kirim</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesans as $index => $pesan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pesan->nama }}</td>
                        <td>{{ $pesan->email }}</td>
                        <td>{{ Str::limit($pesan->pesan, 50) }}</td>
                        <td>{{ \Carbon\Carbon::parse($pesan->created_at)->format('d M Y H:i') }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#detailModal{{ $pesan->id }}">
                                <i class="bi bi-eye"></i> Detail
                            </button>

                            <form action="{{ route('pesan.destroy', $pesan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal{{ $pesan->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $pesan->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailModalLabel{{ $pesan->id }}">Detail Pesan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nama:</strong> {{ $pesan->nama }}</p>
                                    <p><strong>Email:</strong> {{ $pesan->email }}</p>
                                    <p><strong>Pesan:</strong><br>{{ $pesan->pesan }}</p>
                                    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pesan->created_at)->format('d M Y H:i') }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada pesan masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

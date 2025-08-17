<?php

namespace App\Http\Controllers;

use App\Models\LowonganPekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LowonganKerjaController extends Controller
{
    /**
     * Menampilkan daftar lowongan pekerjaan di halaman admin.
     */
    public function index()
    {
        // Ambil semua lowongan pekerjaan untuk ditampilkan di tabel
        $lowonganPekerjaans = LowonganPekerjaan::orderBy('tanggal_upload', 'desc')->get();

        // Jika form edit, ambil lowongan pekerjaan untuk diedit
        $lowonganPekerjaan = null; // Default untuk tambah lowongan pekerjaan
        return view('admin.pages.adminlowongankerja', compact('lowonganPekerjaans', 'lowonganPekerjaan')); // Kirim daftar lowongan pekerjaan dan data lowongan pekerjaan (jika ada)
    }

    public function create()
    {
        // Kirim form tambah lowongan pekerjaan
        return redirect()->route('lowongan-kerja.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal_upload' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'tipe_pekerjaan' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'tautan_lamaran' => 'nullable|url',
        ]);

        $gambarPath = $request->file('gambar')->store('lowongan_pekerjaan', 'public');

        LowonganPekerjaan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'tanggal_upload' => $request->tanggal_upload,
            'lokasi' => $request->lokasi,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'tautan_lamaran' => $request->tautan_lamaran,
        ]);

        return redirect()->route('lowongan-kerja.index')->with('success', 'Lowongan pekerjaan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $lowonganPekerjaan = LowonganPekerjaan::findOrFail($id);
        $lowonganPekerjaans = LowonganPekerjaan::orderBy('tanggal_upload', 'desc')->get();
        return view('admin.pages.adminlowongankerja', compact('lowonganPekerjaan', 'lowonganPekerjaans'));
    }

    public function update(Request $request, $id)
    {
        $lowonganPekerjaan = LowonganPekerjaan::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal_upload' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'tipe_pekerjaan' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'tautan_lamaran' => 'nullable|url',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_upload' => $request->tanggal_upload,
            'lokasi' => $request->lokasi,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'tautan_lamaran' => $request->tautan_lamaran,
        ];

        if ($request->hasFile('gambar')) {
            if ($lowonganPekerjaan->gambar && Storage::disk('public')->exists($lowonganPekerjaan->gambar)) {
                Storage::disk('public')->delete($lowonganPekerjaan->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('lowongan_pekerjaan', 'public');
        }

        $lowonganPekerjaan->update($data);

        return redirect()->route('lowongan-kerja.index')->with('success', 'Lowongan pekerjaan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $lowonganPekerjaan = LowonganPekerjaan::findOrFail($id);

        if ($lowonganPekerjaan->gambar && Storage::disk('public')->exists($lowonganPekerjaan->gambar)) {
            Storage::disk('public')->delete($lowonganPekerjaan->gambar);
        }

        $lowonganPekerjaan->delete();

        return redirect()->route('lowongan-kerja.index')->with('success', 'Lowongan pekerjaan berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita di halaman admin.
     */
    public function index()
{
    // Ambil semua berita untuk ditampilkan di tabel
    $beritas = Berita::orderBy('tanggal_upload', 'desc')->get();

    // Jika form edit, ambil berita untuk diedit
    $berita = null; // Default untuk tambah berita
    return view('admin.pages.adminberita', compact('beritas', 'berita')); // Kirim daftar berita dan data berita (jika ada)
}

public function create()
{
    // Kirim form tambah berita
    return redirect()->route('berita.index');
}

public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'tanggal_upload' => 'required|date',
    ]);

    $gambarPath = $request->file('gambar')->store('berita', 'public');

    Berita::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'gambar' => $gambarPath,
        'tanggal_upload' => $request->tanggal_upload,
    ]);

    return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
}

public function edit($id)
{
    $berita = Berita::findOrFail($id);
    $beritas = Berita::orderBy('tanggal_upload', 'desc')->get();
    return view('admin.pages.adminberita', compact('berita', 'beritas'));
}

public function update(Request $request, $id)
{
    $berita = Berita::findOrFail($id);

    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'tanggal_upload' => 'required|date',
    ]);

    $data = [
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'tanggal_upload' => $request->tanggal_upload,
    ];

    if ($request->hasFile('gambar')) {
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $data['gambar'] = $request->file('gambar')->store('berita', 'public');
    }

    $berita->update($data);

    return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
}

public function destroy($id)
{
    $berita = Berita::findOrFail($id);

    if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
        Storage::disk('public')->delete($berita->gambar);
    }

    $berita->delete();

    return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
}
}
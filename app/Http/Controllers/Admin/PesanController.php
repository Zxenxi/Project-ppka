<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hubungi;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    /**
     * Menampilkan daftar semua pesan masuk.
     */
    public function index()
    {
        $pesans = Hubungi::latest()->get();
        return view('admin.pages.pesanmasuk', compact('pesans'));
    }

    /**
     * Menghapus pesan masuk berdasarkan ID.
     */
    public function destroy($id)
    {
        $pesan = Hubungi::findOrFail($id);
        $pesan->delete();

        return redirect()->route('hubungi.admin')->with('success', 'Pesan berhasil dihapus.');
    }
}

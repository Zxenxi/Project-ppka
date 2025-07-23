<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracer;

class TracerController extends Controller
{
    // Tampilkan form tracer studi
    public function create()
    {
        return view('pages.tracer');
    }

    // Simpan data tracer studi
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer|min:2000|max:' . date('Y'),
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'status' => 'required|string',
            'instansi' => 'nullable|string|max:255',
            'pesan' => 'nullable|string',
        ]);

        Tracer::create([
            'nama' => $request->nama,
            'tahun_lulus' => $request->tahun_lulus,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'status' => $request->status,
            'instansi' => $request->instansi,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('pages.tracer')->with('success', 'Data tracer berhasil dikirim. Terima kasih!');
    }
}

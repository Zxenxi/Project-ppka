<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hubungi;

class HubungiController extends Controller
{
    public function index()
    {
        return view('pages.hubungi');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'pesan' => 'required|string|max:1000',
        ]);

        Hubungi::create($request->only(['nama', 'email', 'pesan']));

        return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class DashboardBeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('tanggal_upload', 'desc')->get();
        return view('pages.berita', compact('beritas'));
    }
}

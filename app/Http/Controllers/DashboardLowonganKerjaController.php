<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LowonganPekerjaan;

class DashboardLowonganKerjaController extends Controller
{
    public function index()
    {
        $lowonganPekerjaans = LowonganPekerjaan::orderBy('tanggal_upload', 'desc')->get();
        return view('pages.lowongankerja', compact('lowonganPekerjaans'));
    }
}

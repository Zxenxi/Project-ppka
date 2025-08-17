<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracer;

class TracerController extends Controller
{
    // Tampilkan halaman tracer studi dengan link Google Form
    public function index()
    {
        $activeTracer = Tracer::where('is_active', true)->first();
        return view('pages.tracer', compact('activeTracer'));
    }
}
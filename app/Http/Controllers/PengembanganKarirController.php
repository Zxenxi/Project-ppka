<?php

namespace App\Http\Controllers;

use App\Models\BimbinganKarir;
use Illuminate\Http\Request;

class PengembanganKarirController extends Controller
{
    public function index()
    {
        $BimbinganKarir = BimbinganKarir::all(); // Fetch all BimbinganKarir, no status filtering
        return view('pages.pengembangan_karir', compact('BimbinganKarir'));
    }
}
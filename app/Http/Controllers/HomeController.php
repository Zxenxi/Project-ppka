<?php

namespace App\Http\Controllers;

use App\Models\BimbinganKarir;
use App\Models\CampusHiring;
use App\Models\LowonganPekerjaan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the 3 most recent items from each category
        $latestJobs = LowonganPekerjaan::latest('tanggal_upload')->take(3)->get();
        $latestGuidance = BimbinganKarir::latest()->take(3)->get();
        $latestHiring = CampusHiring::latest()->take(3)->get();

        return view('pages.home', compact('latestJobs', 'latestGuidance', 'latestHiring'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\CampusHiring;
use Illuminate\Http\Request;

class CampusHiringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all Campus Hiring data, ordered by the newest first
        $campusHirings = CampusHiring::latest()->get();

        // Pass the data to the view
        return view('pages.campus_hiring', ['campusHirings' => $campusHirings]);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampusHiring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampusHiringController extends Controller
{
    public function index()
    {
        $campusHirings = CampusHiring::latest()->get();
        return view('admin.pages.campus_hiring.index', ['campusHirings' => $campusHirings]);
    }

    public function create()
    {
        return view('admin.pages.campus_hiring.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'registration_link' => 'required|url',
            'poster_image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required|in:Online,Offline',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $imagePath = $request->file('poster_image_path')->store('campus_hiring_posters', 'public');

        CampusHiring::create([
            'title' => $request->title,
            'description' => $request->description,
            'registration_link' => $request->registration_link,
            'poster_image_path' => $imagePath,
            'kategori' => $request->kategori,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.campus-hiring.index')->with('success', 'Data created successfully.');
    }

    public function edit(CampusHiring $campusHiring)
    {
        return view('admin.pages.campus_hiring.edit', ['campusHiring' => $campusHiring]);
    }

    public function update(Request $request, CampusHiring $campusHiring)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'registration_link' => 'required|url',
            'poster_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required|in:Online,Offline',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $data = $request->only(['title', 'description', 'registration_link', 'kategori', 'start_date', 'end_date']);

        if ($request->hasFile('poster_image_path')) {
            if ($campusHiring->poster_image_path && Storage::disk('public')->exists($campusHiring->poster_image_path)) {
                Storage::disk('public')->delete($campusHiring->poster_image_path);
            }
            $data['poster_image_path'] = $request->file('poster_image_path')->store('campus_hiring_posters', 'public');
        }

        $campusHiring->update($data);

        return redirect()->route('admin.campus-hiring.index')->with('success', 'Data updated successfully.');
    }

    public function destroy(CampusHiring $campusHiring)
    {
        if ($campusHiring->poster_image_path && Storage::disk('public')->exists($campusHiring->poster_image_path)) {
            Storage::disk('public')->delete($campusHiring->poster_image_path);
        }
        $campusHiring->delete();
        return redirect()->route('admin.campus-hiring.index')->with('success', 'Data deleted successfully.');
    }
}
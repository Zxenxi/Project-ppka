<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BimbinganKarir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BimbinganKarirController extends Controller
{
    public function index()
    {
        $bimbinganKarir = BimbinganKarir::latest()->get();
        return view('admin.pages.bimbingan_karir.index', ['BimbinganKarir' => $bimbinganKarir]);
    }

    public function create()
    {
        return view('admin.pages.bimbingan_karir.create');
    }

    public function store(Request $request)
    {
        // NEW: Updated validation rules
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'registration_link' => 'required|url',
            'poster_image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required|in:Online,Offline',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $imagePath = $request->file('poster_image_path')->store('bimbingan_karir_posters', 'public');

        // NEW: Add new fields to the create method
        BimbinganKarir::create([
            'title' => $request->title,
            'description' => $request->description,
            'registration_link' => $request->registration_link,
            'poster_image_path' => $imagePath,
            'kategori' => $request->kategori,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.bimbingan-karir.index')->with('success', 'Data created successfully.');
    }

    public function edit(BimbinganKarir $bimbinganKarir)
    {
        return view('admin.pages.bimbingan_karir.edit', ['BimbinganKarir' => $bimbinganKarir]);
    }

    public function update(Request $request, BimbinganKarir $bimbinganKarir)
    {
        // NEW: Updated validation rules
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'registration_link' => 'required|url',
            'poster_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required|in:Online,Offline',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // NEW: Include new fields in the data array
        $data = $request->only([
            'title', 'description', 'registration_link', 'kategori', 'start_date', 'end_date'
        ]);

        if ($request->hasFile('poster_image_path')) {
            if ($bimbinganKarir->poster_image_path && Storage::disk('public')->exists($bimbinganKarir->poster_image_path)) {
                Storage::disk('public')->delete($bimbinganKarir->poster_image_path);
            }
            $data['poster_image_path'] = $request->file('poster_image_path')->store('bimbingan_karir_posters', 'public');
        }

        $bimbinganKarir->update($data);

        return redirect()->route('admin.bimbingan-karir.index')->with('success', 'Data updated successfully.');
    }

    public function destroy(BimbinganKarir $bimbinganKarir)
    {
        if ($bimbinganKarir->poster_image_path && Storage::disk('public')->exists($bimbinganKarir->poster_image_path)) {
            Storage::disk('public')->delete($bimbinganKarir->poster_image_path);
        }

        $bimbinganKarir->delete();

        return redirect()->route('admin.bimbingan-karir.index')->with('success', 'Data deleted successfully.');
    }
}
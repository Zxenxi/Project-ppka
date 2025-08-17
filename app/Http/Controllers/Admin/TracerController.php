<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tracer;
use Illuminate\Http\Request;

class TracerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracers = Tracer::all();
        return view('admin.pages.tracer', compact('tracers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'form_link' => 'required|url',
            'is_active' => 'boolean',
        ]);

        // Deactivate all other tracers if this one is set to active
        if ($request->is_active) {
            Tracer::where('is_active', true)->update(['is_active' => false]);
        }

        Tracer::create($request->all());

        return redirect()->route('admin.tracer.index')->with('success', 'Tracer Study berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tracer $tracer)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'form_link' => 'required|url',
            'is_active' => 'boolean',
        ]);

        // Deactivate all other tracers if this one is set to active
        if ($request->is_active) {
            Tracer::where('is_active', true)->where('id', '!=', $tracer->id)->update(['is_active' => false]);
        }

        $tracer->update($request->all());

        return redirect()->route('admin.tracer.index')->with('success', 'Tracer Study berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tracer $tracer)
    {
        $tracer->delete();

        return redirect()->route('admin.tracer.index')->with('success', 'Tracer Study berhasil dihapus!');
    }

    /**
     * Toggle the active status of the specified resource.
     */
    public function toggleActive(Tracer $tracer)
    {
        // Deactivate all other tracers
        Tracer::where('is_active', true)->where('id', '!=', $tracer->id)->update(['is_active' => false]);

        // Toggle the status of the current tracer
        $tracer->is_active = !$tracer->is_active;
        $tracer->save();

        return redirect()->route('admin.tracer.index')->with('success', 'Status Tracer Study berhasil diperbarui!');
    }
}

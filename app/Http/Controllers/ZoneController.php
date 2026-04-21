<?php

namespace App\Http\Controllers;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ZoneController extends Controller
{
    public function index(Request $request)
    {
        $zones = Zone::all();
        return view("admin.pages.zones.index", compact('zones'));
    }

    public function show($id)
    {
        $zones = Zone::find($id);
        return view('admin.pages.zones.show', compact('zones'));
    }

    public function create()
    {
        $zones = Zone::all();
        return view('admin.pages.zones.create', compact('zones'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price_range' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('zones', 'public');
        }

        Zone::create($validated);

        return redirect()->route('admin.zones.index')->with('success', 'Zone created successfully.');
    }

    public function edit($id)
    {
        $zones = Zone::find($id);
        return view('admin.pages.zones.edit', compact('zones'));
    }

    public function update(Request $request, $id)
    {
       $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price_range' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $zones = Zone::find($id);
        if (! $zones) {
            return redirect()->route('admin.zones.index')->with('error', 'Zone not found.');
        }

        if ($request->hasFile('image')) {
            if ($zones->image && Storage::disk('public')->exists($zones->image)) {
                Storage::disk('public')->delete($zones->image);
            }
            $validated['image'] = $request->file('image')->store('zones', 'public');
        }

        $zones->update($validated);

        return redirect()->route('admin.zones.index')->with('success', 'Zone updated successfully.');
    }


    public function destroy($id)
    {
        $zones = Zone::find($id);
        if ($zones) {
            $zones->delete();
            return redirect()->route('admin.zones.index')->with('success', 'Zone deleted successfully.');
        }else {
            return redirect()->route('admin.zones.index')->with('error', 'Zone not found.');
        }
    }



}

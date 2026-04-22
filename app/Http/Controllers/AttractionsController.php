<?php

namespace App\Http\Controllers;
use App\Models\Attractions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttractionsController extends Controller
{
    public function index(Request $request)
    {
        $attractions = Attractions::all();
        return view("admin.pages.attractions.index", compact('attractions'));
    }

    public function show($id)
    {
        $attractions = Attractions::find($id);
        return view('admin.pages.attractions.show', compact('attractions'));
    }

    public function create()
    {
        $attractions = Attractions::all();
        return view('admin.pages.attractions.create', compact('attractions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'ticket_price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('attractions', 'public');
        }

        Attractions::create($validated);

        return redirect()->route('admin.attractions.index')->with('success', 'Attraction created successfully.');
    }

    public function edit($id)
    {
        $attractions = Attractions::find($id);
        return view('admin.pages.attractions.edit', compact('attractions'));
    }

    public function update(Request $request, $id)
    {
       $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'ticket_price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        $attractions = Attractions::find($id);
        if (! $attractions) {
            return redirect()->route('admin.attractions.index')->with('error', 'Attraction not found.');
        }

        if ($request->hasFile('image')) {
            if ($attractions->image && Storage::disk('public')->exists($attractions->image)) {
                Storage::disk('public')->delete($attractions->image);
            }
            $validated['image'] = $request->file('image')->store('attractions', 'public');
        }

        $attractions->update($validated);

        return redirect()->route('admin.attractions.index')->with('success', 'attractions updated successfully.');
    }


    public function destroy($id)
    {
        $attractions = Attractions::find($id);
        if ($attractions) {
            $attractions->delete();
            return redirect()->route('admin.attractions.index')->with('success', 'attractions deleted successfully.');
        }else {
            return redirect()->route('admin.attractions.index')->with('error', 'attractions not found.');
        }
    }
}

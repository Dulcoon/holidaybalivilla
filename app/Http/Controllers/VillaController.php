<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Villa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VillaController extends Controller
{
    public function index()
    {
        $villas = Villa::with('images')->paginate(10);
        return view('villas.index', compact('villas'));
    }

/*************  ✨ Windsurf Command ⭐  *************/
/*******  f2ef3de6-e1ff-4acc-b5fe-a2fb594adadd  *******/
    public function create()
    {
        return view('villas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:villas,slug',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'maps_link' => 'nullable|url',
            'price_per_night' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:1',
            'people' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'swimming_pool' => 'required|integer|min:1',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:available,unavailable,maintenance',
            'fasilitas' => 'nullable|string', // assume input as comma-separated
        ]);

        $data = $request->all();
        $data['slug'] = $request->slug ?: Str::slug($request->name);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $data['thumbnail'] = $thumbnail->store('villas', 'public');
        }

        if ($request->fasilitas) {
            // Form Alpine.js sudah mengirim JSON string, simpan langsung
            $data['fasilitas'] = $request->fasilitas;
        }

        Villa::create($data);

        return redirect()->route('villas.index')->with('success', 'Villa berhasil ditambahkan!');
    }

    public function show(Villa $villa)
    {
        $villa->load('images');
        return view('villas.show', compact('villa'));
    }

    public function edit(Villa $villa)
    {
        return view('villas.edit', compact('villa'));
    }

    public function update(Request $request, Villa $villa)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:villas,slug,' . $villa->id,
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'maps_link' => 'nullable|url',
            'price_per_night' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:1',
            'people' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'swimming_pool' => 'required|integer|min:1',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:available,unavailable,maintenance',
            'fasilitas' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['slug'] = $request->slug ?: Str::slug($request->name);

        if ($request->hasFile('thumbnail')) {
            if ($villa->thumbnail) {
                Storage::disk('public')->delete($villa->thumbnail);
            }
            $thumbnail = $request->file('thumbnail');
            $data['thumbnail'] = $thumbnail->store('villas', 'public');
        }

        if ($request->fasilitas) {
            // Form Alpine.js sudah mengirim JSON string, simpan langsung
            $data['fasilitas'] = $request->fasilitas;
        }

        $villa->update($data);

        return redirect()->route('villas.index')->with('success', 'Villa berhasil diupdate!');
    }

    public function destroy(Villa $villa)
    {
        if ($villa->thumbnail) {
            Storage::disk('public')->delete($villa->thumbnail);
        }
        $villa->images()->delete(); // delete associated images
        $villa->delete();
        return redirect()->route('villas.index')->with('success', 'Villa berhasil dihapus!');
    }
}

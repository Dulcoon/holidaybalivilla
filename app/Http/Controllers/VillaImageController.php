<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Villa;
use App\Models\VillaImage;
use Illuminate\Support\Facades\Storage;

class VillaImageController extends Controller
{
    public function index(Villa $villa)
    {
        $images = $villa->images;
        return view('villa-images.index', compact('villa', 'images'));
    }

    public function create(Villa $villa)
    {
        return view('villa-images.create', compact('villa'));
    }

    public function store(Request $request, Villa $villa)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        foreach ($request->file('images') as $image) {
            $path = $image->store('villa-images', 'public');
            VillaImage::create([
                'villa_id' => $villa->id,
                'image_path' => $path,
                'created_at' => now(),
            ]);
        }

        return redirect()->route('villa-images.index', $villa)->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function destroy(Villa $villa, VillaImage $image)
    {
        if ($image->villa_id !== $villa->id) {
            abort(403);
        }

        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return redirect()->route('villa-images.index', $villa)->with('success', 'Gambar berhasil dihapus!');
    }
}

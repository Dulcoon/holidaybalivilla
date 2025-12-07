<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;

class VillasCustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Villa::where('status', 'available');

        // Search feature - cari berdasarkan nama atau lokasi
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('location', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $villas = $query->orderBy('created_at', 'desc')
                        ->paginate(10)
                        ->appends($request->query());

        return view('homepage.villas', compact('villas'));
    }


    public function show(Villa $villa)
    {
        // Pastikan villa status available
        if ($villa->status !== 'available') {
            abort(404, 'Villa tidak tersedia');
        }

        $villa->load('images');
        return view('homepage.villas-detail', compact('villa'));
    }
}
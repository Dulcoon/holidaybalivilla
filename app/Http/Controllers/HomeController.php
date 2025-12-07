<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Villa;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHomePage()
    {
        // Mengambil semua villa untuk ditampilkan di halaman utama
        $villas = Villa::all();
        
        // Atau jika ingin dengan pagination:
        // $villas = Villa::paginate(12);

        return view('homepage.home', compact('villas'));
    }

    public function product(Request $request)
    {
        $kategoriId = $request->input('kategori_id');

        // Mengambil semua kategori untuk navigasi
        $kategories = Kategori::all();

        // Mengambil produk berdasarkan kategori yang dipilih
        $products = Product::with('kategori')
            ->when($kategoriId, function ($query, $kategoriId) {
                $query->where('kategori_id', $kategoriId);
            })->paginate(10);

        return view('homepage.product', compact('products', 'kategories', 'kategoriId'));
    }

    public function showProductDetail($id)
    {
        $product = Product::findOrFail($id); // Mengambil produk berdasarkan ID
        return view('homepage.product-detail', compact('product'));
    }
}

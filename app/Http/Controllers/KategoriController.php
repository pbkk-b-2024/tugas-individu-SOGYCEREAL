<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;

class KategoriController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $query = KategoriProduk::query();

        if ($search = $request->input('search')) {
            $query->where('id_kategori', 'LIKE', "%{$search}%")
                  ->orWhere('nama_kategori', 'LIKE', "%{$search}%"); // Add other fields as necessary
        }

        $kategoris = $query->paginate(5); // Change '5' to your desired number of records per page
        
        return view('kategori.index', compact('kategoris', 'search'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('kategori.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        KategoriProduk::create($request->all());

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori created successfully.');
    }

    // Display the specified resource.
    public function show(KategoriProduk $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    // Show the form for editing the specified resource.
    public function edit(KategoriProduk $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, KategoriProduk $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(KategoriProduk $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori deleted successfully.');
    }
}

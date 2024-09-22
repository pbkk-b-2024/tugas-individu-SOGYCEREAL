<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Stok;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
 
        $produks = Produk::when($search, function ($query, $search) {
            return $query->where('nama_produk', 'like', "%{$search}%")
                        ->orWhere('deskripsi', 'like', "%{$search}%")
                        ->orWhere('id_produk', 'like', "%{$search}%")
                        ->orWhere('id_kategori', 'like', "%{$search}%")
                        ->orWhere('id_supplier', 'like', "%{$search}%");
        })->paginate(5); // You can change '5' to your desired number of records per page

        return view('produk.index', compact('produks', 'search'));
    }


    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        // Validate product fields
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'id_kategori' => 'nullable',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'stok_tersedia' => 'required|integer',
            'id_supplier' => 'nullable',
        ]);
    
        // Create the product
        $produk = Produk::create($request->except('id_stok')); // Exclude 'id_stok'
    
        // Now create the stock entry for the created product
        Stok::create([
            'produk_id' => $produk->id_produk, // Link to the created product ID
            'jumlah' => $request->stok_tersedia, // Set stock quantity
        ]);
    
        return redirect()->route('produk.index')->with('success', 'Produk created and stock updated successfully.');
    }

    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'id_kategori' => 'required|string',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'stok_tersedia' => 'required|integer',
            'id_supplier' => 'required|string|max:255',
        ]);

        $produk->update($request->except('id_produk')); // Exclude 'id_produk' from update

        return redirect()->route('produk.index')->with('success', 'Produk updated successfully.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk deleted successfully.');
    }
}

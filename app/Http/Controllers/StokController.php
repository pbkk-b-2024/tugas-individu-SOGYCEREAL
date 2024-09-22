<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stok;

class StokController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Retrieve paginated stok records with optional search
        $stoks = Stok::when($search, function ($query) use ($search) {
            return $query->where('id_produk', 'like', "%{$search}%")
                         ->orWhere('id_stok', 'like', "%{$search}%")
                         ->orWhere('jumlah', 'like', "%{$search}%");
        })->paginate(5); // Change '5' to your desired number of records per page

        // Send the paginated data to the view
        return view('stok.index', compact('stoks'));
    }

    public function create()
    {
        return view('stok.create');
    }

    public function store(Request $request)
    {
        // Validate the fields you want to store
        $request->validate([
            'id_produk' => 'required',
            'jumlah' => 'required|integer',
        ]);
    
        // Create new stock entry
        Stok::create($request->only(['id_produk', 'jumlah']));
    
        return redirect()->route('stok.index')->with('success', 'Stok created successfully.');
    }

    public function show(Stok $stok)
    {
        return view('stok.show', compact('stok'));
    }

    public function edit(Stok $stok)
    {
        return view('stok.edit', compact('stok'));
    }

    public function update(Request $request, Stok $stok)
    {
        $request->validate([
            'id_produk' => 'required',
            'jumlah' => 'required|integer',
        ]);

        $stok->update($request->only(['id_produk', 'jumlah'])); // Use only to specify fields
        
        return redirect()->route('stok.index')->with('success', 'Stok updated successfully.');
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();

        return redirect()->route('stok.index')->with('success', 'Stok deleted successfully.');
    }
}

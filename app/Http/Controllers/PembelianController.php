<?php

namespace App\Http\Controllers;
use App\Models\Pembelian;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $pembelians = Pembelian::when($search, function ($query, $search) {
        return $query->where('id_pembelian', 'LIKE', "%{$search}%")
                     ->orWhere('id_supplier', 'LIKE', "%{$search}%")
                     ->orWhere('tanggal_pembelian', 'LIKE', "%{$search}%")
                     ->orWhere('total_harga', 'LIKE', "%{$search}%")
                     ->orWhere('status', 'LIKE', "%{$search}%");
    })->paginate(5); // Change '5' to your desired number of records per page

    return view('pembelian.index', compact('pembelians', 'search'));
}

    public function create()
    {
        $suppliers = Supplier::all(); // Fetch all suppliers for the dropdown
        return view('pembelian.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_supplier' => 'required|string',
            'tanggal_pembelian' => 'required|date',
            'total_harga' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Pembelian::create($request->all());

        return redirect()->route('pembelian.index')->with('success', 'Pembelian created successfully.');
    }

    public function show(Pembelian $pembelian)
    {
        return view('pembelian.show', compact('pembelian'));
    }

    public function edit(Pembelian $pembelian)
    {
        $suppliers = Supplier::all(); // Fetch all suppliers for the dropdown
        return view('pembelian.edit', compact('pembelian', 'suppliers'));
    }

    public function update(Request $request, Pembelian $pembelian)
    {
        $request->validate([
            'id_supplier' => 'required|string',
            'tanggal_pembelian' => 'required|date',
            'total_harga' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $pembelian->update($request->all());

        return redirect()->route('pembelian.index')->with('success', 'Pembelian updated successfully.');
    }

    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Pembelian deleted successfully.');
    }
}

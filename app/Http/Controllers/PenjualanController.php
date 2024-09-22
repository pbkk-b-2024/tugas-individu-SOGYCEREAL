<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Pemesanan;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Eager load 'produk' and 'pemesanan' relationships
        $penjualans = Penjualan::with(['produk', 'pemesanan'])
            ->when($search, function ($query, $search) {
                return $query->where('id_penjualan', 'LIKE', "%{$search}%")
                             ->orWhere('id_produk', 'LIKE', "%{$search}%")
                             ->orWhere('id_pemesanan', 'LIKE', "%{$search}%")
                             ->orWhere('tanggal_penjualan', 'LIKE', "%{$search}%")
                             // Optionally, search within related models
                             ->orWhereHas('produk', function($q) use ($search) {
                                 $q->where('nama_produk', 'LIKE', "%{$search}%");
                             })
                             ->orWhereHas('pemesanan', function($q) use ($search) {
                                 $q->where('alamat_pengiriman', 'LIKE', "%{$search}%");
                             });
            })
            ->paginate(5); // Adjust pagination as needed

        return view('penjualan.index', compact('penjualans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::all();       // Fetch all Produk records
        $pemesanans = Pemesanan::all(); // Fetch all Pemesanan records
        return view('penjualan.create', compact('produks', 'pemesanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'id_pemesanan' => 'required|exists:pemesanan,id_pemesanan',
            'jumlah' => 'required|integer|min:1',
            'harga_jual' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:100',
            'tanggal_penjualan' => 'required|date',
        ]);

        Penjualan::create($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Penjualan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        return view('penjualan.show', compact('penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        $produks = Produk::all();       // Fetch all Produk records
        $pemesanans = Pemesanan::all(); // Fetch all Pemesanan records
        return view('penjualan.edit', compact('penjualan', 'produks', 'pemesanans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'id_pemesanan' => 'required|exists:pemesanan,id_pemesanan',
            'jumlah' => 'required|integer|min:1',
            'harga_jual' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:100',
            'tanggal_penjualan' => 'required|date',
        ]);

        $penjualan->update($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Penjualan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Penjualan deleted successfully.');
    }
}

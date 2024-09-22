<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retur;
use App\Models\TransaksiStok;
use App\Models\Produk;

class ReturController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Retrieve paginated retur records with optional search
        $returs = Retur::when($search, function ($query, $search) {
            return $query->where('id_retur', 'like', "%{$search}%")
                         ->orWhere('id_transaksi', 'like', "%{$search}%")
                         ->orWhere('id_produk', 'like', "%{$search}%")
                         ->orWhere('tanggal_retur', 'like', "%{$search}%")
                         ->orWhere('alasan_retur', 'like', "%{$search}%")
                         ->orWhere('jumlah', 'like', "%{$search}%");
        })->paginate(5); // Change '5' to your desired number of records per page

        return view('retur.index', compact('returs', 'search'));
    }

    public function create()
    {
        $transaksiStoks = TransaksiStok::all();
        $produks = Produk::all();
        return view('retur.create', compact('transaksiStoks', 'produks'));
    }

    public function store(Request $request)
    {
        // Validate and store the data
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'id_transaksi' => 'required|exists:transaksi_stok,id_transaksi',
            'tanggal_retur' => 'required|date',
            'alasan_retur' => 'nullable|string',
            'jumlah' => 'required|integer',
        ]);

        Retur::create($request->all());

        return redirect()->route('retur.index')->with('success', 'Retur berhasil ditambahkan');
    }

    public function show(Retur $retur)
    {
        return view('retur.show', compact('retur'));
    }

    public function edit(Retur $retur)
    {
        $transaksiStoks = TransaksiStok::all();
        $produks = Produk::all();
        return view('retur.edit', compact('retur', 'transaksiStoks', 'produks'));
    }

    public function update(Request $request, Retur $retur)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'id_transaksi' => 'required|exists:transaksi_stok,id_transaksi',
            'tanggal_retur' => 'required|date',
            'alasan_retur' => 'nullable|string',
            'jumlah' => 'required|integer',
        ]);

        $retur->update($request->all());

        return redirect()->route('retur.index')->with('success', 'Retur berhasil diperbarui');
    }

    public function destroy(Retur $retur)
    {
        $retur->delete();

        return redirect()->route('retur.index')->with('success', 'Retur berhasil dihapus');
    }
}

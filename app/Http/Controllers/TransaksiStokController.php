<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiStok;
use Illuminate\Support\Facades\Log;

class TransaksiStokController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Retrieve paginated transaksi_stok records with optional search
        $transaksiStoks = TransaksiStok::when($search, function ($query) use ($search) {
            return $query->where('id_transaksi', 'like', "%{$search}%")
                         ->orWhere('id_produk', 'like', "%{$search}%")
                         ->orWhere('id_stok', 'like', "%{$search}%")
                         ->orWhere('tanggal_transaksi', 'like', "%{$search}%")
                         ->orWhere('jumlah', 'like', "%{$search}%")
                         ->orWhere('tipe_transaksi', 'like', "%{$search}%")
                         ->orWhere('keterangan', 'like', "%{$search}%");
        })->paginate(5); // Change '5' to your desired number of records per page

        // Send the paginated data to the view
        return view('transaksi-stok.index', compact('transaksiStoks', 'search'));
    }

    public function create()
    {
        return view('transaksi-stok.create');
    }

    public function store(Request $request)
    {
        // Log the incoming request data
        Log::info($request->all());

        // Validate and store the data
        $request->validate([
            'id_produk' => 'required',
            'id_stok' => 'required',
            'tanggal_transaksi' => 'required|date',
            'jumlah' => 'required|numeric',
            'tipe_transaksi' => 'required',
            'keterangan' => 'nullable',
        ]);

        TransaksiStok::create($request->all());

        return redirect()->route('transaksi-stok.index')->with('success', 'Transaksi Stok berhasil ditambahkan');
    }

    public function show(TransaksiStok $transaksiStok)
    {
        return view('transaksi-stok.show', compact('transaksiStok'));
    }

    public function edit(TransaksiStok $transaksiStok)
    {
        return view('transaksi-stok.edit', compact('transaksiStok'));
    }

    public function update(Request $request, TransaksiStok $transaksiStok)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'id_stok' => 'required|exists:stok,id_stok',
            'tanggal_transaksi' => 'required|date',
            'jumlah' => 'required|integer',
            'tipe_transaksi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $transaksiStok->update($request->all());

        return redirect()->route('transaksi-stok.index')->with('success', 'Transaksi Stok updated successfully.');
    }

    public function destroy(TransaksiStok $transaksiStok)
    {
        $transaksiStok->delete();

        return redirect()->route('transaksi-stok.index')->with('success', 'Transaksi Stok deleted successfully.');
    }
}

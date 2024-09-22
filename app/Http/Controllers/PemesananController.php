<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    public function index(Request $request)
    {
        $query = Pemesanan::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('id_pemesanan', 'LIKE', "%$search%")
                  ->orWhere('tanggal_pemesanan', 'LIKE', "%$search%")
                  ->orWhere('total_harga', 'LIKE', "%$search%")
                  ->orWhere('status', 'LIKE', "%$search%");
        }

        $pemesanan = $query->paginate(5);

        return view('pemesanan.index', compact('pemesanan'));
    }

    public function create()
    {
        return view('pemesanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pemesanan' => 'required|date',
            'total_harga' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Pemesanan::create($request->all());

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan created successfully.');
    }

    public function show(Pemesanan $pemesanan)
    {
        return view('pemesanan.show', compact('pemesanan'));
    }

    public function edit(Pemesanan $pemesanan)
    {
        return view('pemesanan.edit', compact('pemesanan'));
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'id_pemesanan' => 'required|string|max:6',
            'tanggal_pemesanan' => 'required|date',
            'total_harga' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $pemesanan->update($request->all());

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan updated successfully.');
    }

    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $pengirimans = Pengiriman::all();
    //     return view('pengiriman.index', compact('pengirimans'));
    // }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $pengirimans = Pengiriman::when($search, function ($query, $search) {
            return $query->where('kurir', 'like', "%{$search}%")
                         ->orWhere('alamat_pengiriman', 'like', "%{$search}%")
                         ->orWhere('status_pengiriman', 'like', "%{$search}%")
                         ->orWhere('id_pemesanan', 'like', "%{$search}%")
                         ->orWhere('id_pengiriman', 'like', "%{$search}%");
        })->paginate(5);;


        return view('pengiriman.index', compact('pengirimans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengiriman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pemesanan' => 'required',
            'tanggal_pengiriman' => 'required|date',
            'kurir' => 'required|string|max:255',
            'status_pengiriman' => 'required|string|max:255',
        ]);

        Pengiriman::create($request->all());

        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengiriman $pengiriman)
    {
        return view('pengiriman.show', compact('pengiriman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengiriman $pengiriman)
    {
        return view('pengiriman.edit', compact('pengiriman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        $request->validate([
            'id_pemesanan' => 'required',
            'tanggal_pengiriman' => 'required|date',
            'kurir' => 'required|string|max:255',
            'biaya_pengiriman' => 'required|numeric',
            'status_pengiriman' => 'required|string|max:255',
        ]);

        $pengiriman->update($request->all());

        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengiriman $pengiriman)
    {
        $pengiriman->delete();

        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman deleted successfully.');
    }
}

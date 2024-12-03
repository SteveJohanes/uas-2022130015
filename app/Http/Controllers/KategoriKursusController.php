<?php

namespace App\Http\Controllers;

use App\Models\KategoriKursus;
use Illuminate\Http\Request;

class KategoriKursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriKursus = KategoriKursus::all();
        return view('kategori.index', compact('kategoriKursus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        KategoriKursus::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kategori-kursus.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = KategoriKursus::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori = KategoriKursus::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kategori-kursus.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = KategoriKursus::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori-kursus.index')->with('success', 'Kategori berhasil dihapus.');
    }
}

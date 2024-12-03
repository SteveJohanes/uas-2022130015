<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;
use App\Models\KategoriKursus;
use App\Models\Pengajar;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kursus = Kursus::with('pengajar')->get();
        return view('kursus.index', compact('kursus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengajars = Pengajar::all();
        return view('kursus.create', compact('pengajars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'pengajar_id' => 'required|exists:pengajar,id',
        ]);

        Kursus::create($request->all());

        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('kursus.show', compact('kursus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengajars = Pengajar::all();
        return view('kursus.edit', compact('kursus', 'pengajars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kursus $kursus)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'pengajar_id' => 'required|exists:pengajar,id',
        ]);

        $kursus->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'pengajar_id' => $request->pengajar_id,
        ]);

        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kursus $kursus)
    {
        $kursus->delete();
        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil dihapus.');
    }

}

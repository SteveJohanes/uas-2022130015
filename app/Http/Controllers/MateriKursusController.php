<?php

namespace App\Http\Controllers;

use App\Models\KategoriKursus;
use App\Models\Materi;
use App\Models\MateriKursus;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriKursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriKursuses = KategoriKursus::all();
        $pengajars = Pengajar::all();
        return view('materi.create', compact('kategoriKursuses', 'pengajars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_kursuses,id',
            'materi' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $materiKursus = MateriKursus::create([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'pengajar_id' => Auth::id(),
            'materi' => $request->materi,
            'image' => $request->file('image') ? $request->file('image')->store('materi_images', 'public') : null,
        ]);

        return redirect()->route('materi-kursus.index')
            ->with('success', 'Materi berhasil dibuat!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

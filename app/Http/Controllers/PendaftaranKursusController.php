<?php

namespace App\Http\Controllers;

use App\Models\KategoriKursus;
use App\Models\Kursus;
use App\Models\PendaftaranKursus;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranKursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        $kursus = Kursus::all();

        return view('pendaftaran.create', compact('siswa', 'kursus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriKursuses = KategoriKursus::all();
        return view('pendaftaran.create', compact('kategoriKursuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => ['required', 'exists:kategori_kursuses,id'],
        ]);

        PendaftaranKursus::create([
            'siswa_id' => Auth::id(),
            'kategori_id' => $request->kategori_id,
            'harga' => 0,
            'status' => 'pending',
            'waktu_pendaftaran' => now(),
        ]);

        return redirect()->route('siswa.index')->with('success', 'Pendaftaran kursus berhasil!');
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

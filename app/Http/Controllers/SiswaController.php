<?php

namespace App\Http\Controllers;

use App\Models\KategoriKursus;
use App\Models\Kursus;
use App\Models\Materi;
use App\Models\MateriKursus;
use App\Models\PembayaranKursus;
use App\Models\PendaftaranKursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $siswaId = Auth::id();
        $pendaftaran = PendaftaranKursus::where('siswa_id', $siswaId)->where('status', 'approved')->first();

        if (!$pendaftaran) {
            return redirect()->route('pendaftaran.create')->with('error', 'Anda belum melakukan pembayaran.');
        }

        $pembayaran = PembayaranKursus::where('pendaftaran_kursus_id', $pendaftaran->id)->exists();

        if (!$pembayaran) {
            return redirect()->route('pembayaran.index')->with('error', 'Silakan lakukan pembayaran terlebih dahulu.');
        }

        $kategoriKursuses = KategoriKursus::all();
        $kategoriId = $request->input('kategori_id');

        if ($kategoriId) {
            $materis = Materi::where('kategori_id', $kategoriId)->where('kategori_id', $pendaftaran->kategori_id)->get();
        } else {
            $materis = Materi::where('kategori_id', $pendaftaran->kategori_id)->get();
        }

        return view('siswa.index', compact('materis', 'kategoriKursuses'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $materi = Materi::with('kategori', 'pengajar')->findOrFail($id);
        return view('siswa.show', compact('materi'));
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

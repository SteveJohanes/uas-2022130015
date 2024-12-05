<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\PembayaranKursus;
use App\Models\PendaftaranKursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranKursusController extends Controller
{
    public function index()
    {
        $siswaId = Auth::id();
        $pendaftaran = PendaftaranKursus::where('siswa_id', $siswaId)->where('status', 'pending')->first();

        return view('pembayaran.index', compact('pendaftaran'));
    }

    public function store(Request $request)
    {
        $siswaId = Auth::id();
        $pendaftaran = PendaftaranKursus::where('siswa_id', $siswaId)
            ->where('status', 'pending')
            ->first();

        if (!$pendaftaran) {
            return redirect()->route('pendaftaran.create')->with('error', 'Pendaftaran tidak ditemukan.');
        }

        PembayaranKursus::create([
            'pendaftaran_kursus_id' => $pendaftaran->id,
            'jumlah' => $request->jumlah,
            'waktu_pembayaran' => now(),
        ]);

        $pendaftaran->update(['status' => 'approved']);

        return redirect()->route('siswa.index')->with('success', 'Pembayaran berhasil, akses ke materi diberikan.');
    }
}

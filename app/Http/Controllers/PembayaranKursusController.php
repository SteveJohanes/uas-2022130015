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
        $pendaftarans = PendaftaranKursus::where('siswa_id', $siswaId)
            ->where('status', 'pending')
            ->get();

        return view('pembayaran.index', compact('pendaftarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pendaftaran_id' => 'required|exists:pendaftaran_kursuses,id',
            'jumlah' => 'required|numeric|min:120000',
        ]);

        $pendaftaran = PendaftaranKursus::findOrFail($request->pendaftaran_id);

        if ($pendaftaran->status !== 'pending') {
            return redirect()->route('pembayaran.index')->with('error', 'Pembayaran untuk kursus ini sudah dilakukan.');
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

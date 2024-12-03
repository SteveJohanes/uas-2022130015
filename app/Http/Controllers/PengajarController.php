<?php

namespace App\Http\Controllers;

use App\Models\KategoriKursus;
use App\Models\Materi;
use App\Models\Pengajar;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index()
    {
        $materis = Materi::with('pengajar', 'kategori')->get();
        return view('pengajar.index', compact('materis'));
    }

    public function create()
    {
        $kategoriKursuses = KategoriKursus::all();
        $pengajars = Pengajar::all();
        return view('pengajar.create', compact('kategoriKursuses', 'pengajars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'materi' => 'required|string',
            'kategori_id' => 'required|exists:kategori_kursuses,id',
            'pengajar_id' => 'required|exists:pengajars,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $materi = Materi::create([
            'nama' => $request->nama,
            'materi' => $request->materi,
            'kategori_id' => $request->kategori_id,
            'pengajar_id' => $request->pengajar_id,
            'image' => $request->hasFile('image')
                ? $request->file('image')->store('materi_images', 'public')
                : null,
        ]);

        return redirect()->route('pengajar.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $materi = Materi::with('pengajar', 'kategori')->findOrFail($id);
        return view('pengajar.show', compact('materi'));
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        $kategoriKursuses = KategoriKursus::all();
        $pengajars = Pengajar::all();
        return view('pengajar.edit', compact('materi', 'kategoriKursuses', 'pengajars'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'materi' => 'required|string',
            'kategori_id' => 'required|exists:kategori_kursuses,id',
            'pengajar_id' => 'required|exists:pengajars,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $materi = Materi::findOrFail($id);
        $materi->update([
            'nama' => $request->nama,
            'materi' => $request->materi,
            'kategori_id' => $request->kategori_id,
            'pengajar_id' => $request->pengajar_id,
            'image' => $request->hasFile('image')
                ? $request->file('image')->store('materi_images', 'public')
                : $materi->image,
        ]);

        return redirect()->route('pengajar.index')->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return redirect()->route('pengajar.index')->with('success', 'Materi berhasil dihapus.');
    }
}

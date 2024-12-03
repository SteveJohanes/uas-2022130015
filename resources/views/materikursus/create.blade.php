@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Materi Baru</h1>
    <form action="{{ route('materi-kursus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Materi</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori Kursus</label>
            <select class="form-select" id="kategori_id" name="kategori_id" required>
                <option value="" disabled selected>Pilih Kategori</option>
                @foreach($kategoriKursuses as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="materi" class="form-label">Isi Materi</label>
            <textarea class="form-control" id="materi" name="materi" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Gambar (Opsional)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

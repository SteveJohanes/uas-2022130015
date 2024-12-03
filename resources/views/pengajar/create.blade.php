@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Materi Baru</h2>

        <form action="{{ route('pengajar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Materi</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
            </div>

            <div class="form-group">
                <label for="kategori_id">Pilih Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control" required>
                    @foreach ($kategoriKursuses as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="pengajar_id">Pilih Pengajar</label>
                <select name="pengajar_id" id="pengajar_id" class="form-control" required>
                    @foreach ($pengajars as $pengajar)
                        <option value="{{ $pengajar->id }}">{{ $pengajar->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="materi">Ketik Materi</label>
                <textarea name="materi" id="materi" class="form-control" rows="5" required>{{ old('materi') }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Upload Gambar (opsional)</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Tambah Materi</button>
        </form>
    </div>
@endsection

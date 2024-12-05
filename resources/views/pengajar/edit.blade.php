@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 text-center">Edit Materi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pengajar.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="nama" class="form-label">Nama Materi</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $materi->nama) }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="kategori_id" class="form-label">Pilih Kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-select" required>
                                    <option value="" disabled>Pilih salah satu</option>
                                    @foreach ($kategoriKursuses as $kategori)
                                        <option value="{{ $kategori->id }}" {{ old('kategori_id', $materi->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="pengajar_id" class="form-label">Pilih Pengajar</label>
                                <select name="pengajar_id" id="pengajar_id" class="form-select" required>
                                    <option value="" disabled>Pilih salah satu</option>
                                    @foreach ($pengajars as $pengajar)
                                        <option value="{{ $pengajar->id }}" {{ old('pengajar_id', $materi->pengajar_id) == $pengajar->id ? 'selected' : '' }}>
                                            {{ $pengajar->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="materi" class="form-label">Ketik Materi</label>
                                <textarea name="materi" id="materi" class="form-control" rows="5" required>{{ old('materi', $materi->materi) }}</textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label for="image" class="form-label">Upload Gambar (opsional)</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if($materi->image)
                                    <div class="mt-3 text-center">
                                        <img src="{{ asset('storage/'.$materi->image) }}" alt="Materi Image" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                    </div>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Materi</button>
                                <a href="{{ route('pengajar.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

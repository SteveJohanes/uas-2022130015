@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Materi</h1>

        <!-- Form untuk memilih kategori -->
        <form method="GET" action="{{ route('siswa.index') }}" class="mb-4">
            <div class="form-group">
                <label for="kategori_id">Pilih Kursus:</label>
                <select name="kategori_id" id="kategori_id" class="form-control">
                    @foreach ($kategoriKursuses as $kategori)
                        <option value="{{ $kategori->id }}" {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Tampilkan Materi</button>
        </form>

        <div class="row">
            @foreach ($materis as $materi)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $materi->image) }}" class="card-img-top" alt="{{ $materi->nama }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $materi->nama }}</h5>
                            <p class="card-text">{{ \Str::limit($materi->materi, 100) }}</p>
                            <a href="{{ route('materi.show', $materi->id) }}" class="btn btn-info">Lihat Detail</a>
                        </div>
                        <div class="card-footer text-muted">
                            Kursus: {{ $materi->kategori->nama }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

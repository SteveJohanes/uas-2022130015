@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Materi Kursus</h1>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('siswa.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <select name="kategori_id" id="kategori_id" class="form-select">
                        <option value="">Tampilkan Semua Materi</option>
                        @foreach ($kategoriKursuses as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <div class="row">
            @forelse ($materis as $materi)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($materi->image)
                            <img src="{{ asset('storage/' . $materi->image) }}" class="card-img-top" alt="{{ $materi->nama }}">
                        @else
                            <div class="card-img-top bg-light d-flex justify-content-center align-items-center" style="height: 200px;">
                                <i class="bi bi-file-earmark-text" style="font-size: 3rem; color: #ccc;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $materi->nama }}</h5>
                            <p class="card-text">{{ \Str::limit($materi->materi, 100) }}</p>
                            <p class="text-muted"><strong>Kategori:</strong> {{ $materi->kategori->nama }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('siswa.show', $materi->id) }}" class="btn btn-info w-100">Show</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        Tidak ada materi yang tersedia untuk kursus ini.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection

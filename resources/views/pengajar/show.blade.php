@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Materi</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $materi->nama }}</h5>
                <p class="card-text">{{ $materi->materi }}</p>
                <p><strong>Pengajar:</strong> {{ $materi->pengajar->nama }}</p>
                <p><strong>Kategori:</strong> {{ $materi->kategori->nama }}</p>

                @if($materi->image)
                    <p><strong>Gambar:</strong></p>
                    <img src="{{ asset('storage/' . $materi->image) }}" alt="{{ $materi->nama }}" style="max-width: 100%; height: auto;">
                @endif

                <a href="{{ route('pengajar.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                <a href="{{ route('pengajar.edit', $materi->id) }}" class="btn btn-warning mt-3">Edit Materi</a>
                <form action="{{ route('pengajar.destroy', $materi->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-3">Hapus Materi</button>
                </form>
            </div>
        </div>
    </div>
@endsection

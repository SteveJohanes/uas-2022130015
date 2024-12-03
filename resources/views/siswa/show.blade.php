@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Materi</h1>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $materi->nama }}</h3>
                <p><strong>Kategori:</strong> {{ $materi->kategori->nama }}</p>
                <p><strong>Materi:</strong></p>
                <p>{{ $materi->materi }}</p> <!-- Ini akan menampilkan isi materi -->
                <p><strong>Pengajar:</strong> {{ $materi->pengajar->nama }}</p>
                @if ($materi->image)
                    <img src="{{ asset('storage/' . $materi->image) }}" alt="{{ $materi->nama }}" class="img-fluid">
                @endif
            </div>
        </div>
    </div>
@endsection

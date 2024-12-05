@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Daftar Materi</h2>
        <div class="mb-3 text-end">
            <a href="{{ route('pengajar.create') }}" class="btn btn-success">Tambah Materi Baru</a>
        </div>
        <div class="row">
            @foreach($materis as $materi)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-light shadow-sm">
                        @if($materi->image)
                            <img src="{{ asset('storage/' . $materi->image) }}" class="card-img-top" alt="{{ $materi->nama }}">
                        @else
                            <div class="card-img-top bg-light d-flex justify-content-center align-items-center" style="height: 200px;">
                                <i class="bi bi-file-earmark-text" style="font-size: 4rem; color: #ccc;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $materi->nama }}</h5>
                            <p class="card-text">{{ \Str::limit($materi->materi, 150) }}</p>
                            <p class="text-muted"><strong>Pengajar:</strong> {{ $materi->pengajar->nama }}</p>
                            <p class="text-muted"><strong>Kategori:</strong> {{ $materi->kategori->nama }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('pengajar.show', $materi->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('pengajar.edit', $materi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pengajar.destroy', $materi->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

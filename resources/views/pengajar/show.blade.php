@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $materi->nama }}</h5>
                        <hr>
                        <p><strong>Pengajar:</strong> <span class="text-primary">{{ $materi->pengajar->nama }}</span></p>
                        <p><strong>Kursus:</strong> <span class="badge bg-info text-dark">{{ $materi->kategori->nama }}</span></p>
                        <p class="card-text"><strong>Deskripsi Materi:</strong></p>
                        <p class="text-muted">{{ $materi->materi }}</p>



                        @if($materi->image)
                            <p class="mt-4"><strong>Gambar:</strong></p>
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $materi->image) }}" alt="{{ $materi->nama }}" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('pengajar.index') }}" class="btn btn-secondary">Kembali</a>
                            <div>
                                <a href="{{ route('pengajar.edit', $materi->id) }}" class="btn btn-warning me-2">Edit Materi</a>
                                <form action="{{ route('pengajar.destroy', $materi->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus Materi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

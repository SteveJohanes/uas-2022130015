@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary me-2">Kembali</a>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">{{ $materi->nama }}</h3>

                        <div class="mb-3">
                            <p><strong>Kursus:</strong> <span
                                    class="badge bg-info text-dark">{{ $materi->kategori->nama }}</span></p>
                        </div>

                        <div class="mb-4">
                            <p><strong>Pengajar:</strong> <span class="text-primary">{{ $materi->pengajar->nama }}</span>
                            </p>
                        </div>

                        <div class="mb-4">
                            <p><strong>Materi:</strong></p>
                            <p class="text-muted">{{ $materi->materi }}</p>
                        </div>


                        @if ($materi->image)
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/' . $materi->image) }}" alt="{{ $materi->nama }}"
                                    class="img-fluid rounded shadow-sm" style="max-width: 100%; height: auto;">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

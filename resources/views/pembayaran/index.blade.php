@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-success text-white text-center">
                        <h2 class="mb-0">Pembayaran Kursus</h2>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger text-center">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <p class="text-center text-muted">
                            Silakan lakukan pembayaran untuk melanjutkan akses ke materi kursus.
                        </p>
                        <form action="{{ route('pembayaran.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="pendaftaran_id" class="form-label">Pilih Kursus</label>
                                <select name="pendaftaran_id" id="pendaftaran_id" class="form-select" required>
                                    <option value="" disabled selected>Pilih Kursus</option>
                                    @foreach ($pendaftarans as $pendaftaran)
                                        <option value="{{ $pendaftaran->id }}">
                                            {{ $pendaftaran->kategori->nama }} - Rp 120.000
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="jumlah" class="form-label">Jumlah Pembayaran</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control"
                                       placeholder="Masukkan jumlah pembayaran" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success w-100">Lakukan Pembayaran</button>
                            </div>
                            <div class="text-center mt-4">
                                <a href="{{ route('pendaftaran.create') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

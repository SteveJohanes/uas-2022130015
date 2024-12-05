@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="mb-0">Pendaftaran Kursus</h2>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('pendaftaran.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="kategori_id" class="form-label">Pilih Kursus</label>
                                <select id="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror"
                                        name="kategori_id" required>
                                    <option value="" disabled selected>Pilih Kursus</option>
                                    @foreach ($kategoriKursuses as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" id="harga" name="harga" class="form-control"
                                       value="120000" readonly>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p>Sudah mendaftar tetapi belum bayar?</p>
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-warning">Bayar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pendaftaran Kursus</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('pendaftaran.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Pilih Kursus</label>
                <select id="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id"
                    required>
                    <option value="" disabled selected>Pilih Kursus</option>
                    @foreach ($kategoriKursuses as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" id="harga" name="harga" class="form-control" value="120000" readonly>
                </div>
                @error('kategori_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
@endsection

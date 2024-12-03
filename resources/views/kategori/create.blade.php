@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kategori Kursus</h1>
    <form action="{{ route('kategori-kursus.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama kategori" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Kategori</button>
    </form>
</div>
@endsection

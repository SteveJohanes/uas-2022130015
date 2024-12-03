@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kategori Kursus</h1>
    <form action="{{ route('kategori-kursus.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kategori->nama }}" required>
        </div>
        <button type="submit" class="btn btn-success">Perbarui Kategori</button>
    </form>
</div>
@endsection

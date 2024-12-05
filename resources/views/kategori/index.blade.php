@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Kategori Kursus</h1>
    <a href="{{ route('kategori-kursus.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    <a href="{{ route('pengajar.index') }}" class="btn btn-secondary mb-3">Kembali ke Halaman Pengajar</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoriKursus as $kategori)
                <tr>
                    <td>{{ $kategori->nama }}</td>
                    <td>
                        <a href="{{ route('kategori-kursus.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kategori-kursus.destroy', $kategori->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

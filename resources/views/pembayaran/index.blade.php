@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Pembayaran Kursus</h2>
        <p>Silakan lakukan pembayaran untuk melanjutkan akses ke materi kursus.</p>
        <form action="{{ route('pembayaran.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="jumlah">Jumlah Pembayaran</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Lakukan Pembayaran</button>
        </form>
    </div>
@endsection

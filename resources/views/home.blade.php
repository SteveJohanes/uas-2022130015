@extends('layouts.app')

@section('content')
    <section class="hero py-5 bg-primary d-flex text-light text-center">
        <div class="container d-flex align-items-center">
            <div class="content col-md-8">
                <h1>Belajar Bahasa dengan Cara yang Menyenangkan</h1>
                <a href="{{ route('pendaftaran.create') }}" class="btn btn-light btn-lg mt-3">Mulai Belajar</a>
            </div>
            <div class="image col-md-4 text-right">
                <img src="{{ asset('storage/gambarbaner.png') }}" alt="Banner Image" class="img-fluid">
            </div>
        </div>
    </section>

    <section id="sponsor" class="py-5 bg-white">
        <div class="container text-center">
            <h2>Didukung Oleh</h2>
            <div class="sponsor-slider mt-5">
                <div class="sponsor-track">
                    <div class="sponsor-item">
                        <img src="{{ asset('storage/ets.png') }}" alt="Sponsor 1" class="img-fluid">
                    </div>
                    <div class="sponsor-item">
                        <img src="{{ asset('storage/forum.jpeg') }}" alt="Sponsor 2"class="img-fluid">
                    </div>
                    <div class="sponsor-item">
                        <img src="{{ asset('storage/jlpt.png') }}" alt="Sponsor 3" class="img-fluid">
                    </div>
                    <div class="sponsor-item">
                        <img src="{{ asset('storage/lsk.png') }}" alt="Sponsor 4" class="img-fluid">
                    </div>
                    <div class="sponsor-item">
                        <img src="{{ asset('storage/nat.jpg') }}" alt="Sponsor 5" class="img-fluid">
                    </div>
                    <div class="sponsor-item">
                        <img src="{{ asset('storage/bakor.png') }}" alt="Sponsor 6" class="img-fluid">
                    </div>
                    <div class="sponsor-item">
                        <img src="{{ asset('storage/iief.jpg') }}" alt="Sponsor 7" class="img-fluid">
                    </div>
                    <div class="sponsor-item">
                        <img src="{{ asset('storage/jlpt.png') }}" alt="Sponsor 8" class="img-fluid">
                    </div>
                    <div class="sponsor-item">
                        <img src="{{ asset('storage/lsk.png') }}" alt="Sponsor 9" class="img-fluid">
                    </div>
                    <div class="sponsor-item">
                        <img src="{{ asset('storage/nat.jpg') }}" alt="Sponsor 10" class="img-fluid">
                    </div>
                    <div class="sponsor-item">
                        <img src="{{ asset('storage/bakor.png') }}" alt="Sponsor 11" class="img-fluid">
                    </div>
                    <div class="sponsor-item">
                        <img src="{{ asset('storage/iief.jpg') }}" alt="Sponsor 12" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-courses py-5">
        <div class="container">
            <h2 class="text-center mb-4">Kursus Populer</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-lg">
                        <img src="{{ asset('storage/jepang.jpeg') }}" class="card-img-top"
                            style="height: 200px; object-fit: cover;" alt="Jepang">
                        <div class="card-body">
                            <h5 class="card-title">Bahasa Jepang</h5>
                            <p class="card-text">Pelajari bahasa Jepang dari dasar hingga mahir dengan metode interaktif.
                            </p>
                            <a href="{{ route('siswa.index') }}" class="btn btn-primary w-100">Mulai Kursus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-lg">
                        <img src="{{ asset('storage/china.jpg') }}" class="card-img-top"
                            style="height: 200px; object-fit: cover;" alt="China">
                        <div class="card-body">
                            <h5 class="card-title">Bahasa China</h5>
                            <p class="card-text">Belajar bahasa China dengan materi yang komprehensif dan praktis.</p>
                            <a href="{{ route('siswa.index') }}" class="btn btn-primary w-100">Mulai Kursus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-lg">
                        <img src="{{ asset('storage/inggris.jpg') }}" class="card-img-top"
                            style="height: 200px; object-fit: cover;" alt="Inggris">
                        <div class="card-body">
                            <h5 class="card-title">Bahasa Inggris</h5>
                            <p class="card-text">Tingkatkan kemampuan bahasa Inggris Anda dengan pelajaran yang
                                menyenangkan.</p>
                            <a href="{{ route('siswa.index') }}" class="btn btn-primary w-100">Mulai Kursus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sertifikat" class="py-5 bg-light">
        <div class="container text-center">
            <h2>Sertifikat Resmi</h2>
            <p>Setiap peserta yang menyelesaikan kursus akan mendapatkan sertifikat resmi yang dapat digunakan untuk
                menambah kredibilitas Anda.</p>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-3">
                    <img src="{{ asset('storage/sering.jpg') }}" alt="Sertifikat 1" class="img-fluid rounded shadow"
                        style="height: 290px; object-fit: cover; width: 100%;">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="{{ asset('storage/serjep.jpeg') }}" alt="Sertifikat 2" class="img-fluid rounded shadow"
                        style="height: 290px; object-fit: cover; width: 100%;">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="{{ asset('storage/serman.png') }}" alt="Sertifikat 3" class="img-fluid rounded shadow"
                        style="height: 290px; object-fit: cover; width: 100%;">
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="py-5 pb-10">
        <div class="container text-center">
            <h2>Testimoni Pengguna</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-card shadow p-3 mb-5 bg-white rounded">
                        <p>"Langhub adalah cara terbaik untuk belajar <br>bahasa!"</p>
                        <p><strong>John Doe</strong></p>
                        <p><em>Pengguna Aktif</em></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card shadow p-3 mb-5 bg-white rounded">
                        <p>"Kursusnya sangat <br>interaktif dan menyenangkan."</p>
                        <p><strong>Jane Smith</strong></p>
                        <p><em>Pengguna Aktif</em></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card shadow p-3 mb-5 bg-white rounded">
                        <p>"Saya bisa belajar bahasa dengan cara yang menyenangkan dan mudah dipahami."</p>
                        <p><strong>Michael Johnson</strong></p>
                        <p><em>Pengguna Aktif</em></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-4" style="width: 100%;">
        <div class="container">
            <div class="mb-3">
                <a href="https://www.facebook.com" class="text-white mx-2" target="_blank"
                    style="text-decoration: none;">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="https://www.twitter.com" class="text-white mx-2" target="_blank"
                    style="text-decoration: none;">
                    <i class="fab fa-twitter"></i> Twitter
                </a>
                <a href="https://www.instagram.com" class="text-white mx-2" target="_blank"
                    style="text-decoration: none;">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
                <a href="https://www.linkedin.com" class="text-white mx-2" target="_blank"
                    style="text-decoration: none;">
                    <i class="fab fa-linkedin-in"></i> LinkedIn
                </a>
            </div>

            <div class="mb-3">
                <p>
                    <strong>Hubungi Kami:</strong><br>
                    Email: <a href="mailto:support@belajarbahasa.com" class="text-white"
                        style="text-decoration: none;">support@belajarbahasa.com</a><br>
                    Telepon: <a href="https://wa.me/6285871424750" class="text-white" style="text-decoration: none;"
                        target="_blank">+62 858-7142-4750</a>
                </p>
            </div>

            <div class="mb-3">
                <a href="/tentang-kami" class="text-white mx-2" style="text-decoration: none;">Tentang Kami</a>
                <a href="/privasi" class="text-white mx-2" style="text-decoration: none;">Kebijakan Privasi</a>
                <a href="/syarat-ketentuan" class="text-white mx-2" style="text-decoration: none;">Syarat & Ketentuan</a>
                <a href="/bantuan" class="text-white mx-2" style="text-decoration: none;">Bantuan</a>
            </div>

            <div class="py-2">
                <p>&copy; 2024 Website Belajar Bahasa. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>
@endsection

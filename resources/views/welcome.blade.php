<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Belajar Bahasa</title>
    <!-- Link ke Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="bg-success text-white text-center py-4">
        <h1>Selamat Datang di Website Belajar Bahasa</h1>
        <nav>
            <ul class="list-unstyled d-flex justify-content-center">
                <li class="mx-3"><a href="#features" class="text-white">Fitur</a></li>
                <li class="mx-3"><a href="{{ route('kursus.index') }}" class="text-white">Kursus</a></li>
                <li class="mx-3"><a href="#testimonials" class="text-white">Testimoni</a></li>
            </ul>
        </nav>
    </header>

    <section id="features" class="my-4">
        <div class="container">
            <h2>Fitur Utama</h2>
            <ul>
                <li>Belajar dengan cara yang menyenangkan</li>
                <li>Kursus dalam berbagai bahasa</li>
                <li>Kompetisi dengan teman</li>
            </ul>
        </div>
    </section>

    <section id="courses" class="my-4">
        <div class="container">
            <h2>Kursus Tersedia</h2>
            <p>Pilih dari berbagai kursus bahasa yang kami tawarkan.</p>
        </div>
    </section>

    <section id="testimonials" class="my-4">
        <div class="container">
            <h2>Testimoni Pengguna</h2>
            <p>"Duolingo adalah cara terbaik untuk belajar bahasa!"</p>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Website Belajar Bahasa. Semua hak dilindungi.</p>
    </footer>

    <!-- Tambahkan JS untuk interaktivitas -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const features = document.getElementById('features');
            features.addEventListener('click', function() {
                alert('Fitur ini akan segera hadir!');
            });
        });
    </script>

    <!-- Link ke Bootstrap JS (untuk interaktivitas seperti dropdown dan modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

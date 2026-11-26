<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Siger Rasa Nusantara - UMKM Kuliner Tradisional</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --brand-gold: #d4a017;
            --brand-dark: #1f2937;
        }
        .navbar-brand img {
            transition: transform 0.25s ease;
        }
        .navbar-brand:hover img {
            transform: scale(1.08);
        }
        .badge-category {
            background-color: #f59e0b;
            color: #1f2937;
            font-weight: 600;
        }
        .product-card {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Header & Navigasi -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm py-2">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold fs-5" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo PT Siger Rasa Nusantara" height="42" class="me-2" style="object-fit: contain;">
                <span>PT Siger Rasa Nusantara</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('home') ? 'active fw-bold text-warning' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-shop me-1"></i> Beranda Publik
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('home') }}#tentang-kami">
                            <i class="bi bi-info-circle me-1"></i> Deskripsi Usaha
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('admin*') ? 'active fw-bold text-warning' : '' }}" href="{{ route('products.index') }}">
                            <i class="bi bi-speedometer2 me-1"></i> Kelola Produk (Admin)
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a class="btn btn-warning btn-sm fw-bold px-3 text-dark" href="{{ route('products.create') }}">
                            <i class="bi bi-plus-lg me-1"></i> Tambah Produk
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="container my-4 flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-4 pb-3 mt-auto border-top border-warning border-3">
        <div class="container">
            <div class="row gy-3 align-items-center">
                <div class="col-md-7 text-center text-md-start d-flex align-items-center justify-content-center justify-content-md-start gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo PT Siger Rasa Nusantara" height="52" style="object-fit: contain;">
                    <div>
                        <h6 class="fw-bold text-warning mb-1">
                            PT Siger Rasa Nusantara
                        </h6>
                        <p class="small text-secondary mb-0">
                            UMKM Pengolahan Camilan & Minuman Tradisional Khas Nusantara.<br>
                            Melestarikan cita rasa nusantara dengan kualitas dan higienitas terjamin.
                        </p>
                    </div>
                </div>
                <div class="col-md-5 text-center text-md-end">
                    <p class="small text-secondary mb-1">
                        Tugas UTS Pemrograman Web Dinamis Menggunakan Framework Laravel
                    </p>
                    <div class="small fw-semibold text-light">
                        &copy; {{ date('Y') }} PT Siger Rasa Nusantara &mdash; Disusun oleh: <span class="text-warning">Septian Aprizal</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

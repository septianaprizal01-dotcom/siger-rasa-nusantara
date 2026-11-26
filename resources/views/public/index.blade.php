@extends('layouts.app')

@section('content')
<!-- Hero Banner -->
<div class="p-4 p-md-5 mb-5 rounded-4 text-white shadow-sm" style="background: linear-gradient(135deg, #1f2937 0%, #374151 50%, #111827 100%); border-left: 8px solid #d4a017;">
    <div class="row align-items-center gy-4">
        <div class="col-md-4 text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo PT Siger Rasa Nusantara" 
                 class="img-fluid" 
                 style="max-height: 200px; width: auto; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.4));">
        </div>
        <div class="col-md-8 text-center text-md-start">
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-2">
                <i class="bi bi-patch-check-fill me-1"></i> UMKM Resmi & Terpercaya
            </span>
            <h1 class="display-5 fw-bold text-white mb-2">PT Siger Rasa Nusantara</h1>
            <p class="fs-5 text-light opacity-90 mb-3">
                Melestarikan Warisan Cita Rasa Tradisional Nusantara dengan Kualitas Premium & Bahan Alami Terbaik.
            </p>
            <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-start">
                <a href="#katalog-produk" class="btn btn-warning fw-bold px-4 py-2 text-dark shadow-sm">
                    <i class="bi bi-grid-fill me-1"></i> Jelajahi Produk
                </a>
                <a href="#tentang-kami" class="btn btn-outline-light px-4 py-2">
                    <i class="bi bi-info-circle me-1"></i> Tentang Usaha
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Section: Deskripsi & Profil Usaha UMKM -->
<section id="tentang-kami" class="mb-5">
    <div class="text-center mb-4">
        <h6 class="text-warning text-uppercase fw-bold letter-spacing-1">Tentang Kami</h6>
        <h2 class="fw-bold">Profil & Deskripsi Usaha UMKM</h2>
        <div class="bg-warning mx-auto" style="height: 3px; width: 60px;"></div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-sm p-4 rounded-3">
                <h4 class="fw-bold text-dark mb-3">
                    <i class="bi bi-shop-window text-warning me-2"></i>Tentang PT Siger Rasa Nusantara
                </h4>
                <p class="text-muted leading-relaxed mb-3">
                    <strong>PT Siger Rasa Nusantara</strong> adalah unit Usaha Mikro, Kecil, dan Menengah (UMKM) yang berfokus pada pengolahan makanan ringan khas tradisional dan minuman herbal alami khas Nusantara. Berdiri dengan semangat mengangkat potensi komoditas pangan lokal, kami memadukan resep otentik warisan leluhur dengan standar pengolahan modern yang higienis.
                </p>
                <p class="text-muted leading-relaxed mb-0">
                    Nama <em>"Siger"</em> mencerminkan kebanggaan budaya daerah (mahkota kehormatan tradisional) yang melambangkan keagungan rasa dan mutu istimewa dari setiap olahan yang kami hadirkan kepada seluruh pecinta kuliner Nusantara.
                </p>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-sm p-4 rounded-3">
                <h4 class="fw-bold text-dark mb-3">
                    <i class="bi bi-bullseye text-warning me-2"></i>Visi & Misi Usaha
                </h4>
                <div class="mb-3">
                    <h6 class="fw-bold mb-1 text-primary"><i class="bi bi-check2-circle me-1"></i> Visi:</h6>
                    <p class="text-muted small mb-0">
                        Menjadi UMKM kuliner tradisional unggulan yang mampu memperkenalkan keanekaragaman cita rasa asli Nusantara ke pasar nasional hingga mancanegara secara berkelanjutan.
                    </p>
                </div>
                <div>
                    <h6 class="fw-bold mb-1 text-primary"><i class="bi bi-list-check me-1"></i> Misi:</h6>
                    <ul class="text-muted small ps-3 mb-0">
                        <li>Menggunakan bahan baku lokal berkualitas tinggi langsung dari petani dan nelayan mitra.</li>
                        <li>Memastikan standar mutu pangan yang higienis, 100% halal, dan bebas dari bahan pengawet kimia berbahaya.</li>
                        <li>Memberdayakan tenaga kerja lokal demi mendorong kemandirian ekonomi masyarakat sekitar.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 4 Nilai Unggulan -->
        <div class="col-12">
            <div class="row g-3">
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 shadow-sm text-center p-3 h-100">
                        <div class="text-warning display-6 mb-2"><i class="bi bi-flower1"></i></div>
                        <h6 class="fw-bold">100% Bahan Alami</h6>
                        <small class="text-muted">Tanpa pemanis buatan maupun zat pewarna sintetis.</small>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 shadow-sm text-center p-3 h-100">
                        <div class="text-warning display-6 mb-2"><i class="bi bi-shield-check"></i></div>
                        <h6 class="fw-bold">Higienis & Halal</h6>
                        <small class="text-muted">Proses pengolahan bersih sesuai standar sanitasi pangan.</small>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 shadow-sm text-center p-3 h-100">
                        <div class="text-warning display-6 mb-2"><i class="bi bi-people-fill"></i></div>
                        <h6 class="fw-bold">Bermitra Lokal</h6>
                        <small class="text-muted">Mendukung langsung petani kopi, pisang, dan nelayan lokal.</small>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 shadow-sm text-center p-3 h-100">
                        <div class="text-warning display-6 mb-2"><i class="bi bi-box-seam"></i></div>
                        <h6 class="fw-bold">Kemasan Eksklusif</h6>
                        <small class="text-muted">Kemasan kedap udara menjaga rasa tetap renyah dan segar.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Katalog Produk Publik -->
<section id="katalog-produk" class="mb-5">
    <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-2">
        <div>
            <h6 class="text-warning text-uppercase fw-bold letter-spacing-1 mb-1">Pilihan Terbaik</h6>
            <h2 class="fw-bold mb-0">Katalog Produk UMKM</h2>
        </div>
        <span class="badge bg-dark px-3 py-2">
            <i class="bi bi-tags me-1"></i> {{ $products->count() }} Produk Tersedia
        </span>
    </div>

    @if ($products->isEmpty())
        <div class="alert alert-info text-center py-5">
            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
            <h5>Belum ada produk yang ditampilkan.</h5>
            <p class="text-muted mb-3">Silakan jalankan database seeder atau tambahkan produk baru melalui panel admin.</p>
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">+ Tambah Produk</a>
        </div>
    @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card product-card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                        <div class="position-relative">
                            <img src="{{ $product->image_url }}"
                                 class="card-img-top" 
                                 alt="{{ $product->name }}" 
                                 style="height: 220px; object-fit: cover;"
                                 onerror="this.onerror=null; this.src='{{ asset('images/default-food.png') }}';">
                            <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2 fw-semibold shadow-sm">
                                <i class="bi bi-tag-fill me-1"></i>{{ $product->category->name }}
                            </span>
                        </div>
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fw-bold text-dark mb-1">{{ $product->name }}</h5>
                            <h5 class="text-success fw-bold mb-3">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </h5>
                            <p class="card-text text-muted small flex-grow-1 leading-normal mb-3">
                                {{ Str::limit($product->description, 110) }}
                            </p>
                            <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                                <span class="badge bg-light text-secondary border">Stok Tersedia</span>
                                <a href="{{ route('public.show', $product->id) }}" class="btn btn-dark btn-sm px-3 fw-semibold">
                                    Lihat Detail &raquo;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>

<!-- Section: Kontak & Lokasi Usaha -->
<section class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white mb-4">
    <div class="row align-items-center gy-4">
        <div class="col-lg-8">
            <h4 class="fw-bold mb-2">Ingin Memesan Produk atau Bekerja Sama?</h4>
            <p class="text-muted mb-0">
                Hubungi bagian pemasaran <strong>PT Siger Rasa Nusantara</strong> untuk pesanan grosir, oleh-oleh haji/umroh, souvenir kantor, maupun kemitraan reseller kuliner.
            </p>
        </div>
        <div class="col-lg-4 text-lg-end">
            <a href="https://wa.me/6281234567890?text=Halo%20PT%20Siger%20Rasa%20Nusantara,%20saya%20tertarik%20dengan%20produk%20UMKM%20Anda" 
               target="_blank" 
               class="btn btn-success btn-lg fw-bold shadow-sm">
                <i class="bi bi-whatsapp me-2"></i> Hubungi via WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection

@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda Publik</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}#katalog-produk" class="text-decoration-none">Katalog Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
    </ol>
</nav>

<div class="card shadow-sm border-0 rounded-4 overflow-hidden">
    <div class="row g-0">
        <!-- Foto Produk dari storage/public -->
        <div class="col-md-5 bg-dark d-flex align-items-center justify-content-center p-3">
            <img src="{{ $product->image_url }}"
                 class="img-fluid rounded-3 w-100 shadow-sm" 
                 alt="{{ $product->name }}" 
                 style="object-fit: cover; max-height: 420px;"
                 onerror="this.onerror=null; this.src='{{ asset('images/default-food.png') }}';">
        </div>

        <!-- Detail Produk -->
        <div class="col-md-7">
            <div class="card-body p-4 p-md-5 d-flex flex-column h-100">
                <div class="mb-3">
                    <span class="badge bg-warning text-dark px-3 py-2 fw-semibold rounded-pill">
                        <i class="bi bi-tag-fill me-1"></i> {{ $product->category->name }}
                    </span>
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold rounded-pill ms-2">
                        <i class="bi bi-check-circle-fill me-1"></i> Produk UMKM Siap Kirim
                    </span>
                </div>

                <h2 class="card-title fw-bold text-dark mb-2">{{ $product->name }}</h2>

                <div class="my-3 p-3 bg-light rounded-3 border-start border-success border-4">
                    <span class="text-muted small d-block">Harga Satuan:</span>
                    <h3 class="text-success fw-bold mb-0">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </h3>
                </div>

                <div class="mb-4 flex-grow-1">
                    <h6 class="fw-bold text-secondary mb-2"><i class="bi bi-card-text me-1"></i> Deskripsi Produk:</h6>
                    <p class="card-text text-muted leading-relaxed" style="white-space: pre-line;">
                        {{ $product->description }}
                    </p>
                </div>

                <div class="row g-2 mb-4">
                    <div class="col-sm-6">
                        <div class="p-2 border rounded text-muted small">
                            <i class="bi bi-shield-check text-success me-1"></i> 100% Bebas Bahan Kimia
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-2 border rounded text-muted small">
                            <i class="bi bi-box2 text-primary me-1"></i> Kemasan Segel Higienis
                        </div>
                    </div>
                </div>

                <div class="pt-3 border-top d-flex flex-wrap gap-2 justify-content-between align-items-center">
                    <a href="{{ route('home') }}#katalog-produk" class="btn btn-outline-dark">
                        &laquo; Kembali ke Katalog
                    </a>
                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo PT Siger Rasa Nusantara, saya ingin memesan ' . $product->name . ' seharga Rp ' . number_format($product->price, 0, ',', '.')) }}" 
                       target="_blank" 
                       class="btn btn-success fw-bold px-4 shadow-sm">
                        <i class="bi bi-whatsapp me-1"></i> Pesan Produk Ini
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

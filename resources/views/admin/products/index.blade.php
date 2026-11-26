@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h3 class="fw-bold mb-1"><i class="bi bi-gear-wide-connected me-2"></i>Kelola Produk (Admin CRUD)</h3>
        <p class="text-muted small mb-0">Manajemen data produk UMKM PT Siger Rasa Nusantara (Tambah, Ubah, Hapus, Daftar Data).</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('home') }}" class="btn btn-outline-dark btn-sm">
            <i class="bi bi-eye me-1"></i> Lihat Halaman Publik
        </a>
        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm fw-semibold">
            <i class="bi bi-plus-circle me-1"></i> Tambah Produk Baru
        </a>
    </div>
</div>

<!-- Kartu Ringkasan -->
<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm p-3 bg-white">
            <div class="d-flex align-items-center">
                <div class="p-3 bg-primary bg-opacity-10 rounded-circle text-primary me-3">
                    <i class="bi bi-box-seam fs-4"></i>
                </div>
                <div>
                    <span class="text-muted small">Total Produk Terdaftar</span>
                    <h4 class="fw-bold mb-0">{{ $products->count() }} Item</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm p-3 bg-white">
            <div class="d-flex align-items-center">
                <div class="p-3 bg-warning bg-opacity-10 rounded-circle text-warning me-3">
                    <i class="bi bi-tags fs-4"></i>
                </div>
                <div>
                    <span class="text-muted small">Kategori Produk</span>
                    <h4 class="fw-bold mb-0">{{ $totalCategories ?? \App\Models\Category::count() }} Kategori</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alert Notifikasi -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Tabel Data Produk -->
<div class="card border-0 shadow-sm rounded-3 overflow-hidden">
    <div class="card-header bg-dark text-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold"><i class="bi bi-table me-2"></i>Daftar Seluruh Produk</h6>
        <span class="badge bg-warning text-dark">{{ $products->count() }} Data</span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;" class="text-center">No</th>
                    <th style="width: 90px;" class="text-center">Foto</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga (Rp)</th>
                    <th>Deskripsi Singkat</th>
                    <th style="width: 160px;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td class="text-center fw-semibold text-muted">{{ $index + 1 }}</td>
                        <td class="text-center">
                            <img src="{{ $product->image_url }}"
                                 alt="{{ $product->name }}" 
                                 width="60" height="60" 
                                 class="rounded-3 shadow-sm border" 
                                 style="object-fit: cover;"
                                 onerror="this.onerror=null; this.src='{{ asset('images/default-food.png') }}';">
                        </td>
                        <td>
                            <strong class="text-dark">{{ $product->name }}</strong>
                        </td>
                        <td>
                            <span class="badge bg-warning text-dark">
                                {{ $product->category->name }}
                            </span>
                        </td>
                        <td class="fw-bold text-success">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        <td class="small text-muted">
                            {{ Str::limit($product->description, 60) }}
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('public.show', $product->id) }}" class="btn btn-outline-secondary" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning" title="Ubah Data">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk {{ $product->name }}? File foto di storage juga akan dihapus.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Hapus Data">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            Belum ada data produk tersimpan.<br>
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm mt-3">+ Tambah Produk Pertama</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

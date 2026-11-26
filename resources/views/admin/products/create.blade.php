@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0 fw-bold"><i class="bi bi-plus-circle me-2"></i>Tambah Produk Baru</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="category_id" class="form-label fw-semibold">Kategori Produk <span class="text-danger">*</span></label>
                        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                               class="form-control @error('name') is-invalid @enderror" 
                               placeholder="Contoh: Keripik Pisang Cokelat Lumer" maxlength="100" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Maksimal 100 karakter.</small>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" name="price" id="price" value="{{ old('price') }}" 
                               class="form-control @error('price') is-invalid @enderror" 
                               placeholder="Contoh: 18000" min="1000" step="500" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format angka (nominal rupiah), minimal Rp 1.000.</small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">Deskripsi Produk <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" rows="4" 
                                  class="form-control @error('description') is-invalid @enderror" 
                                  placeholder="Jelaskan bahan baku, keunggulan rasa, dan kemasan produk..." maxlength="500" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Maksimal 500 karakter.</small>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold">Foto Produk</label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Disimpan di <code>storage/public/products</code>.</small>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            &laquo; Kembali ke Daftar
                        </a>
                        <button type="submit" class="btn btn-primary px-4 fw-semibold">
                            <i class="bi bi-save me-1"></i> Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

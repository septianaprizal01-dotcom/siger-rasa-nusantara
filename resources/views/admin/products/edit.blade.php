@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i>Edit Produk: {{ $product->name }}</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="category_id" class="form-label fw-semibold">Kategori Produk <span class="text-danger">*</span></label>
                        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" 
                               class="form-control @error('name') is-invalid @enderror" maxlength="100" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Maksimal 100 karakter.</small>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" 
                               class="form-control @error('price') is-invalid @enderror" min="1000" step="500" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format angka (nominal rupiah), minimal Rp 1.000.</small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">Deskripsi Produk <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" rows="4" 
                                  class="form-control @error('description') is-invalid @enderror" maxlength="500" required>{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Maksimal 500 karakter.</small>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold">Ganti Foto Produk (Opsional)</label>
                        @if ($product->image)
                            <div class="mb-2 p-2 border rounded bg-light d-flex align-items-center">
                                <img src="{{ $product->image_url }}" 
                                     alt="{{ $product->name }}" 
                                     width="80" height="80" 
                                     class="rounded me-3 border shadow-sm" 
                                     style="object-fit: cover;"
                                     onerror="this.onerror=null; this.src='{{ asset('images/default-food.png') }}';">
                                <div class="small text-muted">
                                    <strong>Foto saat ini tersimpan di:</strong><br>
                                    <code>storage/app/public/{{ $product->image }}</code><br>
                                    Unggah file baru di bawah ini hanya jika ingin menggantinya.
                                </div>
                            </div>
                        @endif
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            &laquo; Batal
                        </a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold">
                            <i class="bi bi-arrow-repeat me-1"></i> Perbarui Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

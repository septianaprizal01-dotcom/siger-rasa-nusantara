<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        return view('admin.products.index', compact('products', 'totalProducts', 'totalCategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi form server-side:
        // 1. Wajib diisi (required)
        // 2. Maksimal karakter / ukuran (max)
        // 3. Tipe data (string, numeric, exists, image)
        $rules = [
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:100',
            'price'       => 'required|numeric|min:1000',
            'description' => 'required|string|max:500',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        $messages = [
            'category_id.required' => 'Kategori produk wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid di database.',
            'name.required'        => 'Nama produk wajib diisi.',
            'name.string'          => 'Nama produk harus berupa string (teks).',
            'name.max'             => 'Nama produk tidak boleh melebihi 100 karakter.',
            'price.required'       => 'Harga produk wajib diisi.',
            'price.numeric'        => 'Harga produk harus bertipe data angka (numerik).',
            'price.min'            => 'Harga produk minimal Rp 1.000.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'description.string'   => 'Deskripsi produk harus berupa string (teks).',
            'description.max'      => 'Deskripsi produk tidak boleh melebihi 500 karakter.',
            'image.image'          => 'File yang diunggah harus bertipe data gambar.',
            'image.mimes'          => 'Format gambar harus bertipe JPG, JPEG, atau PNG.',
            'image.max'            => 'Ukuran foto produk maksimal 2MB (2048 KB).',
        ];

        $validated = $request->validate($rules, $messages);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk baru berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        // Validasi form server-side
        $rules = [
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:100',
            'price'       => 'required|numeric|min:1000',
            'description' => 'required|string|max:500',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        $messages = [
            'category_id.required' => 'Kategori produk wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid di database.',
            'name.required'        => 'Nama produk wajib diisi.',
            'name.string'          => 'Nama produk harus berupa string (teks).',
            'name.max'             => 'Nama produk tidak boleh melebihi 100 karakter.',
            'price.required'       => 'Harga produk wajib diisi.',
            'price.numeric'        => 'Harga produk harus bertipe data angka (numerik).',
            'price.min'            => 'Harga produk minimal Rp 1.000.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'description.string'   => 'Deskripsi produk harus berupa string (teks).',
            'description.max'      => 'Deskripsi produk tidak boleh melebihi 500 karakter.',
            'image.image'          => 'File yang diunggah harus bertipe data gambar.',
            'image.mimes'          => 'Format gambar harus bertipe JPG, JPEG, atau PNG.',
            'image.max'            => 'Ukuran foto produk maksimal 2MB (2048 KB).',
        ];

        $validated = $request->validate($rules, $messages);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada di storage/public
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Data produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        // Hapus gambar terkait di storage/public jika ada
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}

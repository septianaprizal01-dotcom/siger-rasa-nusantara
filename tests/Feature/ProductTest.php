<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    protected $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = Category::create(['name' => 'Camilan Khas']);
    }

    /** Test 1: Halaman publik menampilkan PT, logo, deskripsi UMKM, dan katalog */
    public function test_public_home_page_displays_products_and_umkm_description(): void
    {
        Product::create([
            'category_id' => $this->category->id,
            'name'        => 'Keripik Pisang Cokelat Lumer',
            'price'       => 18000,
            'description' => 'Keripik pisang renyah berbalut cokelat.',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('PT Siger Rasa Nusantara');
        $response->assertSee('images/logo.png');
        $response->assertSee('Deskripsi Usaha UMKM');
        $response->assertSee('Katalog Produk UMKM');
        $response->assertSee('Keripik Pisang Cokelat Lumer');
    }

    /** Test 2: Halaman detail per produk */
    public function test_public_product_detail_page(): void
    {
        $product = Product::create([
            'category_id' => $this->category->id,
            'name'        => 'Kemplang Panggang Ikan Tenggiri',
            'price'       => 22000,
            'description' => 'Kemplang bakar asli dengan sambal terasi.',
        ]);

        $response = $this->get('/produk/' . $product->id);

        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee($product->category->name);
        $response->assertSee(number_format($product->price, 0, ',', '.'));
    }

    /** Test 3: Halaman daftar produk di admin */
    public function test_admin_products_index_page(): void
    {
        $response = $this->get('/admin/products');

        $response->assertStatus(200);
        $response->assertSee('Kelola Produk (Admin CRUD)');
        $response->assertSee('Tambah Produk Baru');
    }

    /** Test 4: Halaman form create produk admin */
    public function test_admin_product_create_page(): void
    {
        $response = $this->get('/admin/products/create');

        $response->assertStatus(200);
        $response->assertSee('Tambah Produk Baru');
        $response->assertSee($this->category->name);
    }

    /** Test 5: Server-side validation rules minimal 3 aturan (wajib diisi, maksimal karakter, tipe data) */
    public function test_validation_rules_are_enforced(): void
    {
        $response = $this->post('/admin/products', [
            'category_id' => 99999, // exists rule
            'name'        => '',    // required
            'price'       => 'bukan_angka', // numeric rule
            'description' => str_repeat('A', 600), // max:500 rule
        ]);

        $response->assertSessionHasErrors(['category_id', 'name', 'price', 'description']);
    }

    /** Test 6: Admin dapat menambah produk baru beserta upload foto ke storage/public */
    public function test_admin_can_store_product_with_image(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('camilan.png', 50, 'image/png');

        $payload = [
            'category_id' => $this->category->id,
            'name'        => 'Kue Semprong Renyah',
            'price'       => 16000,
            'description' => 'Kue semprong tradisional dengan aroma kelapa dan wijen.',
            'image'       => $file,
        ];

        $response = $this->post('/admin/products', $payload);

        $response->assertRedirect('/admin/products');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('products', [
            'name'  => 'Kue Semprong Renyah',
            'price' => 16000,
        ]);

        $product = Product::where('name', 'Kue Semprong Renyah')->first();
        Storage::disk('public')->assertExists($product->image);
    }

    /** Test 7: Admin dapat mengupdate data produk */
    public function test_admin_can_update_product(): void
    {
        $product = Product::create([
            'category_id' => $this->category->id,
            'name'        => 'Produk Sebelum Diubah',
            'price'       => 10000,
            'description' => 'Deskripsi sebelum diubah.',
        ]);

        $response = $this->put('/admin/products/' . $product->id, [
            'category_id' => $this->category->id,
            'name'        => 'Produk Setelah Diubah',
            'price'       => 20000,
            'description' => 'Deskripsi baru yang sudah diperbarui.',
        ]);

        $response->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', [
            'id'    => $product->id,
            'name'  => 'Produk Setelah Diubah',
            'price' => 20000,
        ]);
    }

    /** Test 8: Admin dapat menghapus data produk */
    public function test_admin_can_delete_product(): void
    {
        $product = Product::create([
            'category_id' => $this->category->id,
            'name'        => 'Produk Siap Hapus',
            'price'       => 12000,
            'description' => 'Deskripsi produk siap hapus.',
        ]);

        $response = $this->delete('/admin/products/' . $product->id);

        $response->assertRedirect('/admin/products');
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}

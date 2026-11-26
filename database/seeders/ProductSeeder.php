<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Kategori Usaha UMKM
        $camilan = Category::firstOrCreate(['name' => 'Camilan Khas']);
        $minuman = Category::firstOrCreate(['name' => 'Minuman Herbal & Kopi']);
        $sambal  = Category::firstOrCreate(['name' => 'Sambal & Bumbu Tradisional']);

        $products = [
            [
                'category_id' => $camilan->id,
                'name'        => 'Keripik Pisang Cokelat Lumer',
                'price'       => 18000,
                'description' => 'Keripik pisang kepok pilihan khas Lampung dengan balutan lelehan cokelat pekat premium. Renyah di luar dan manis legit di lidah tanpa pemanis buatan.',
                'image'       => 'products/pisang-cokelat.jpg',
            ],
            [
                'category_id' => $camilan->id,
                'name'        => 'Kemplang Panggang Ikan Tenggiri',
                'price'       => 22000,
                'description' => 'Kerupuk kemplang khas Nusantara berbahan daging ikan tenggiri segar yang dipanggang secara tradisional di atas bara arang kelapa. Disajikan bersama sambal terasi khas pedas manis.',
                'image'       => 'products/kemplang-tenggiri.jpg',
            ],
            [
                'category_id' => $minuman->id,
                'name'        => 'Kopi Robusta Bubuk Petik Merah',
                'price'       => 25000,
                'description' => 'Kopi Robusta single origin dari dataran tinggi Lampung, dipetik merah sempurna dan disangrai medium-dark. Menghasilkan cita rasa bold dengan aroma cokelat alami yang harum.',
                'image'       => 'products/kopi-robusta.jpg',
            ],
            [
                'category_id' => $minuman->id,
                'name'        => 'Wedang Jahe Merah Instan Gula Aren',
                'price'       => 20000,
                'description' => 'Minuman herbal sari jahe merah asli dipadukan dengan gula aren organik dan rempah pilihan. Berkhasiat menghangatkan tubuh, meningkatkan imun, serta praktis diseduh air hangat.',
                'image'       => 'products/wedang-jahe.jpg',
            ],
            [
                'category_id' => $sambal->id,
                'name'        => 'Sambal Teri Crispy Gurih Pedas',
                'price'       => 24000,
                'description' => 'Sambal ulek basah dengan racikan cabai rawit segar dan taburan ikan teri medan renyah berkualitas. Dikemas higienis dengan segel kedap udara, siap santap bersama nasi hangat.',
                'image'       => 'products/sambal-teri.jpg',
            ],
        ];

        foreach ($products as $item) {
            // Salin foto bawaan dari public/images/products ke storage/app/public/products
            // agar tersedia di storage/public maupun public/images
            $sourcePath = public_path('images/' . $item['image']);
            if (file_exists($sourcePath)) {
                Storage::disk('public')->put($item['image'], file_get_contents($sourcePath));
            }

            Product::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'price', 'description', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Mengembalikan URL gambar produk yang selalu valid:
     * 1. Cek di public/storage (hasil upload atau storage:link)
     * 2. Fallback ke public/images (agar foto seeder langsung tampil tanpa perlu upload/storage:link)
     * 3. Fallback ke gambar default
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            if (file_exists(public_path('storage/' . $this->image))) {
                return asset('storage/' . $this->image);
            }

            if (file_exists(public_path('images/' . $this->image))) {
                return asset('images/' . $this->image);
            }
        }

        return asset('images/default-food.png');
    }
}

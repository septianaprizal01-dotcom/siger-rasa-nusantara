<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PublicController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('public.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load('category');
        return view('public.show', compact('product'));
    }
}
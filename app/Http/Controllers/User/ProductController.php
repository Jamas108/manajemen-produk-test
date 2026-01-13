<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(12);
        return view('user.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load('category', 'images');
        return view('user.products.show', compact('product'));
    }

    public function categories()
    {
        $categories = Category::withCount('products')->get();
        return view('user.categories.index', compact('categories'));
    }
}
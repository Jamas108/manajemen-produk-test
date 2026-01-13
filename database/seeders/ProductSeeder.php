<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Electronics
            [
                'category_id' => 1,
                'name' => 'Smartphone X Pro',
                'slug' => 'smartphone-x-pro',
                'description' => 'Latest flagship smartphone with advanced features',
                'price' => 8999000,
                'stock' => 50,
                'sku' => 'ELEC-001',
            ],
            [
                'category_id' => 1,
                'name' => 'Wireless Headphones',
                'slug' => 'wireless-headphones',
                'description' => 'Premium noise-cancelling headphones',
                'price' => 1500000,
                'stock' => 100,
                'sku' => 'ELEC-002',
            ],

            // Clothing
            [
                'category_id' => 2,
                'name' => 'Cotton T-Shirt',
                'slug' => 'cotton-t-shirt',
                'description' => 'Comfortable 100% cotton t-shirt',
                'price' => 150000,
                'stock' => 200,
                'sku' => 'CLTH-001',
            ],
            [
                'category_id' => 2,
                'name' => 'Denim Jeans',
                'slug' => 'denim-jeans',
                'description' => 'Classic fit denim jeans',
                'price' => 350000,
                'stock' => 150,
                'sku' => 'CLTH-002',
            ],

            // Books
            [
                'category_id' => 3,
                'name' => 'Laravel Guide',
                'slug' => 'laravel-guide',
                'description' => 'Complete guide to Laravel development',
                'price' => 250000,
                'stock' => 75,
                'sku' => 'BOOK-001',
            ],
            [
                'category_id' => 3,
                'name' => 'PHP Mastery',
                'slug' => 'php-mastery',
                'description' => 'Advanced PHP programming techniques',
                'price' => 300000,
                'stock' => 60,
                'sku' => 'BOOK-002',
            ],

            // Home & Garden
            [
                'category_id' => 4,
                'name' => 'Garden Tool Set',
                'slug' => 'garden-tool-set',
                'description' => 'Complete set of gardening tools',
                'price' => 500000,
                'stock' => 40,
                'sku' => 'HOME-001',
            ],
            [
                'category_id' => 4,
                'name' => 'LED Table Lamp',
                'slug' => 'led-table-lamp',
                'description' => 'Modern LED desk lamp with dimmer',
                'price' => 200000,
                'stock' => 80,
                'sku' => 'HOME-002',
            ],

            // Sports
            [
                'category_id' => 5,
                'name' => 'Yoga Mat',
                'slug' => 'yoga-mat',
                'description' => 'Non-slip premium yoga mat',
                'price' => 180000,
                'stock' => 120,
                'sku' => 'SPRT-001',
            ],
            [
                'category_id' => 5,
                'name' => 'Dumbell Set 5kg',
                'slug' => 'dumbell-set-5kg',
                'description' => 'Professional grade dumbbell set',
                'price' => 450000,
                'stock' => 50,
                'sku' => 'SPRT-002',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
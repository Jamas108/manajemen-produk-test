<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices and gadgets',
                'slug' => 'electronics',
            ],
            [
                'name' => 'Clothing',
                'description' => 'Fashion and apparel',
                'slug' => 'clothing',
            ],
            [
                'name' => 'Books',
                'description' => 'Books and publications',
                'slug' => 'books',
            ],
            [
                'name' => 'Home & Garden',
                'description' => 'Home improvement and garden supplies',
                'slug' => 'home-garden',
            ],
            [
                'name' => 'Sports',
                'description' => 'Sports equipment and accessories',
                'slug' => 'sports',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
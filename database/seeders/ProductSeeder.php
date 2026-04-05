<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $dienThoai = Category::where('slug', 'dien-thoai')->first();
        $laptop = Category::where('slug', 'laptop')->first();
        $tablet = Category::where('slug', 'tablet')->first();
        $phuKien = Category::where('slug', 'phu-kien')->first();

        $products = [
            // Điện thoại
            [
                'category_id' => $dienThoai->id,
                'name' => 'iPhone 15 Pro Max',
                'slug' => 'iphone-15-pro-max',
                'description' => '<p>iPhone 15 Pro Max với chip A17 Pro mạnh mẽ, camera 48MP, màn hình Super Retina XDR 6.7 inch.</p><ul><li>Chip A17 Pro</li><li>Camera 48MP</li><li>Pin 4422mAh</li></ul>',
                'price' => 29990000,
                'stock_quantity' => 50,
                'status' => 'published',
                'warranty_period' => 12,
            ],
            [
                'category_id' => $dienThoai->id,
                'name' => 'Samsung Galaxy S24 Ultra',
                'slug' => 'samsung-galaxy-s24-ultra',
                'description' => '<p>Samsung Galaxy S24 Ultra với bút S Pen, camera 200MP, màn hình Dynamic AMOLED 2X.</p>',
                'price' => 27990000,
                'stock_quantity' => 35,
                'status' => 'published',
                'warranty_period' => 12,
            ],
            [
                'category_id' => $dienThoai->id,
                'name' => 'Xiaomi 14 Pro',
                'slug' => 'xiaomi-14-pro',
                'description' => '<p>Xiaomi 14 Pro với camera Leica, chip Snapdragon 8 Gen 3.</p>',
                'price' => 18990000,
                'stock_quantity' => 0,
                'status' => 'out_of_stock',
                'warranty_period' => 18,
            ],
            
            // Laptop
            [
                'category_id' => $laptop->id,
                'name' => 'MacBook Pro 14 M3',
                'slug' => 'macbook-pro-14-m3',
                'description' => '<p>MacBook Pro 14 inch với chip M3, RAM 16GB, SSD 512GB.</p><ul><li>Chip Apple M3</li><li>RAM 16GB</li><li>SSD 512GB</li><li>Màn hình Liquid Retina XDR</li></ul>',
                'price' => 42990000,
                'stock_quantity' => 20,
                'status' => 'published',
                'warranty_period' => 12,
            ],
            [
                'category_id' => $laptop->id,
                'name' => 'Dell XPS 15',
                'slug' => 'dell-xps-15',
                'description' => '<p>Dell XPS 15 với Intel Core i7, RAM 32GB, màn hình 4K OLED.</p>',
                'price' => 38990000,
                'stock_quantity' => 15,
                'status' => 'published',
                'warranty_period' => 24,
            ],
            [
                'category_id' => $laptop->id,
                'name' => 'ASUS ROG Zephyrus G14',
                'slug' => 'asus-rog-zephyrus-g14',
                'description' => '<p>Laptop gaming ASUS ROG với AMD Ryzen 9, RTX 4060.</p>',
                'price' => 35990000,
                'stock_quantity' => 8,
                'status' => 'draft',
                'warranty_period' => 24,
            ],
            
            // Tablet
            [
                'category_id' => $tablet->id,
                'name' => 'iPad Pro 12.9 M2',
                'slug' => 'ipad-pro-12-9-m2',
                'description' => '<p>iPad Pro 12.9 inch với chip M2, màn hình Liquid Retina XDR.</p>',
                'price' => 28990000,
                'stock_quantity' => 25,
                'status' => 'published',
                'warranty_period' => 12,
            ],
            [
                'category_id' => $tablet->id,
                'name' => 'Samsung Galaxy Tab S9 Ultra',
                'slug' => 'samsung-galaxy-tab-s9-ultra',
                'description' => '<p>Samsung Galaxy Tab S9 Ultra với màn hình 14.6 inch, bút S Pen.</p>',
                'price' => 24990000,
                'stock_quantity' => 18,
                'status' => 'published',
                'warranty_period' => 12,
            ],
            
            // Phụ kiện
            [
                'category_id' => $phuKien->id,
                'name' => 'AirPods Pro 2',
                'slug' => 'airpods-pro-2',
                'description' => '<p>Tai nghe AirPods Pro thế hệ 2 với chống ồn chủ động.</p>',
                'price' => 5990000,
                'stock_quantity' => 100,
                'status' => 'published',
                'warranty_period' => 12,
            ],
            [
                'category_id' => $phuKien->id,
                'name' => 'Ốp lưng iPhone 15 Pro Max',
                'slug' => 'op-lung-iphone-15-pro-max',
                'description' => '<p>Ốp lưng silicone chính hãng Apple cho iPhone 15 Pro Max.</p>',
                'price' => 990000,
                'stock_quantity' => 200,
                'status' => 'published',
                'warranty_period' => 6,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

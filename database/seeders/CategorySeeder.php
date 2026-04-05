<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Điện thoại',
                'slug' => 'dien-thoai',
                'description' => 'Điện thoại thông minh các loại',
                'is_visible' => true,
            ],
            [
                'name' => 'Laptop',
                'slug' => 'laptop',
                'description' => 'Máy tính xách tay cho công việc và giải trí',
                'is_visible' => true,
            ],
            [
                'name' => 'Tablet',
                'slug' => 'tablet',
                'description' => 'Máy tính bảng iPad, Samsung Galaxy Tab',
                'is_visible' => true,
            ],
            [
                'name' => 'Phụ kiện',
                'slug' => 'phu-kien',
                'description' => 'Phụ kiện điện thoại, laptop',
                'is_visible' => true,
            ],
            [
                'name' => 'Đồng hồ thông minh',
                'slug' => 'dong-ho-thong-minh',
                'description' => 'Smartwatch Apple Watch, Samsung Galaxy Watch',
                'is_visible' => false,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

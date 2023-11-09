<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Category::where('name', 'Cross')->first()->products()->createMany([

            [
                'name' => 'Dép cross',
                'price' => 120000,
                'image' => '',
                'desc' => 'K.mãi'
            ],
            [
                'name' => 'Dép cross trắng',
                'price' => 130000,
                'image' => 'upload/product/images/2.jpg',
                'desc' => 'K.mãi'
            ],
            [
                'name' => 'Dép cross nâu',
                'price' => 140000,
                'image' => 'upload/product/images/3.jpg',
                'desc' => 'K.mãi'
            ],
            [
                'name' => 'Dép cross kiểu',
                'price' => 110000,
                'image' => 'upload/product/images/4.jpg',
                'desc' => 'K.mãi'
            ],
            [
                'name' => 'Dép cross vịt vàng',
                'price' => 100000,
                'image' => 'upload/product/images/5.jpg',
                'desc' => 'K.mãi'
            ],
            [
                'name' => 'Giày boot cổ cao',
                'price' => 160000,
                'image' => 'upload/product/images/6.jpg',
                'desc' => 'K.mãi'
            ],
            [
                'name' => 'Giày boot cổ thấp đen',
                'price' => 150000,
                'image' => 'upload/product/images/7.jpg',
                'desc' => 'K.mãi'
            ],
            [
                'name' => 'Giày sandal',
                'price' => 120000,
                'image' => 'upload/product/images/8.jpg',
                'desc' => 'K.mãi'
            ]

        ]);
    }
}
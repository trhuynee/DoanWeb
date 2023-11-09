<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create(['name'=> 'Cross']);
        Category::create(['name'=> 'Boot']);
        Category::create(['name'=> 'Khác']);
        //...
    }
}
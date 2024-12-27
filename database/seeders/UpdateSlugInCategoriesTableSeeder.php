<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UpdateSlugInCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::all()->each(function ($category) {
            $category->update([
                'slug' => Str::slug($category->name) // Tạo slug từ title
            ]);
        });
    }
}

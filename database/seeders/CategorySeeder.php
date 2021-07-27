<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parentCategory = Category::create([
            'name'      => 'Alimentos',
            'slug'      => 'alimentos',
            'parent_id' => null,
            'active'    => 1,
        ]);

        Category::create([
            'name'      => 'Sushi',
            'slug'      => 'sushi',
            'parent_id' => $parentCategory->id,
            'active'    => 1,
        ]);

        Category::create([
            'name'      => 'Brasileira',
            'slug'      => 'brasileira',
            'parent_id' => $parentCategory->id,
            'active'    => 1,
        ]);
    }
}

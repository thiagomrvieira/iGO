<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;


class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create([
            'name'      => 'Entradas',
            'slug'      => 'entradas',
            'active'    => 1,
        ]);

        ProductCategory::create([
            'name'      => 'Bebidas',
            'slug'      => 'bebidas',
            'active'    => 1,
        ]);

        ProductCategory::create([
            'name'      => 'Pratos principais',
            'slug'      => 'pratos-principais',
            'active'    => 1,
        ]);

        ProductCategory::create([
            'name'      => 'Sobremesas',
            'slug'      => 'sobremesas',
            'active'    => 1,
        ]);
    }
}

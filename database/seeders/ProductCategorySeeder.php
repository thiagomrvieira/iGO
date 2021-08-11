<?php

namespace Database\Seeders;

use App\Models\PartnerCategory;
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
        $partnerCategory = PartnerCategory::where('slug', 'alimentos')->first();

        ProductCategory::create([
            'name'                => 'Entradas',
            'slug'                => 'entradas',
            'partner_category_id' => $partnerCategory->id, 
            'active'              => 1,
        ]);

        ProductCategory::create([
            'name'                => 'Bebidas',
            'slug'                => 'bebidas',
            'partner_category_id' => $partnerCategory->id, 
            'active'              => 1,
        ]);

        ProductCategory::create([
            'name'                => 'Pratos principais',
            'slug'                => 'pratos-principais',
            'partner_category_id' => $partnerCategory->id, 
            'active'              => 1,
        ]);

        ProductCategory::create([
            'name'                => 'Sobremesas',
            'slug'                => 'sobremesas',
            'partner_category_id' => $partnerCategory->id, 
            'active'              => 1,
        ]);
    }
}

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
        $restaurante = PartnerCategory::where('slug', 'restaurantes')->first();

        $data = array(
            array('name' => 'Entradas',          'partner_category_id' => $restaurante->id, 'slug' => 'entradas',          'active' => true),
            array('name' => 'Bebidas',           'partner_category_id' => $restaurante->id, 'slug' => 'bebidas',           'active' => true),
            array('name' => 'Pratos principais', 'partner_category_id' => $restaurante->id, 'slug' => 'pratos-principais', 'active' => true),
            array('name' => 'Sobremesas',        'partner_category_id' => $restaurante->id, 'slug' => 'sobremesas',        'active' => true),
        );
        
        ProductCategory::insert($data);
    }
}

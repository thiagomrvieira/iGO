<?php

namespace Database\Seeders;

use App\Models\PartnerCategory;
use App\Models\ProductOption;
use Illuminate\Database\Seeder;

class ProductOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurantes = PartnerCategory::where('slug', 'restaurantes')->first();

        #   Options
        $data = array(
            array('name' => 'extra', 'description' => 'Opções com custo adicional ex: Bacon, Pepperoni', 'partner_category_id' => $restaurantes->id),
            array('name' => 'side',  'description' => 'Acompanhamentos ex: Farofa, Arroz, etc',          'partner_category_id' => $restaurantes->id),
            array('name' => 'sauce', 'description' => 'Molhos ex: Barbecue, Agridoce, Tomate, etc',      'partner_category_id' => $restaurantes->id),
        );
        
        #   Cria Product Options
        ProductOption::insert($data);
    }
}

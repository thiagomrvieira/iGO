<?php

namespace Database\Seeders;

use App\Models\Allergen;
use App\Models\PartnerCategory;
use Illuminate\Database\Seeder;

class AllergenSeeder extends Seeder
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
            array('name'=>'Glúten',        'category_id'=> $restaurante->id, 'slug' => 'gluten',        'active' => true),
            array('name'=>'Amendoim',      'category_id'=> $restaurante->id, 'slug' => 'amendoim',      'active' => true),
            array('name'=>'Lactose',       'category_id'=> $restaurante->id, 'slug' => 'lactose',       'active' => true),
            array('name'=>'Crustáceos',    'category_id'=> $restaurante->id, 'slug' => 'crustaceos',    'active' => true),
            array('name'=>'Frutos do mar', 'category_id'=> $restaurante->id, 'slug' => 'frutos-do-mar', 'active' => true),
            array('name'=>'Molusculos',    'category_id'=> $restaurante->id, 'slug' => 'molusculos',    'active' => true),
            array('name'=>'Soja',          'category_id'=> $restaurante->id, 'slug' => 'soja',          'active' => true),
        );
        
        Allergen::insert($data);
    }
}

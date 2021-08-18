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
        $partnerCategory = PartnerCategory::where('slug', 'alimentos')->first();

        $data = array(
            array('name'=>'Glúten',                        'category_id'=> $partnerCategory->id, 'slug' => 'gluten',                        'active' => true),
            array('name'=>'Peixes',                        'category_id'=> $partnerCategory->id, 'slug' => 'peixes',                        'active' => true),
            array('name'=>'Lactose',                       'category_id'=> $partnerCategory->id, 'slug' => 'lactose',                       'active' => true),
            array('name'=>'Mostarda',                      'category_id'=> $partnerCategory->id, 'slug' => 'mostarda',                      'active' => true),
            array('name'=>'Tremoço',                       'category_id'=> $partnerCategory->id, 'slug' => 'tremoco',                       'active' => true),
            array('name'=>'Crustáceos',                    'category_id'=> $partnerCategory->id, 'slug' => 'crustaceos',                    'active' => true),
            array('name'=>'Amendoins',                     'category_id'=> $partnerCategory->id, 'slug' => 'amendoins',                     'active' => true),
            array('name'=>'Frutos de casca rija',          'category_id'=> $partnerCategory->id, 'slug' => 'frutos-de-casca-rija',          'active' => true),
            array('name'=>'Sementes sésamo',               'category_id'=> $partnerCategory->id, 'slug' => 'sementes-sesamo',               'active' => true),
            array('name'=>'Moluscos',                      'category_id'=> $partnerCategory->id, 'slug' => 'moluscos',                      'active' => true),
            array('name'=>'Ovos',                          'category_id'=> $partnerCategory->id, 'slug' => 'ovos',                          'active' => true),
            array('name'=>'Soja',                          'category_id'=> $partnerCategory->id, 'slug' => 'soja',                          'active' => true),
            array('name'=>'Aipo',                          'category_id'=> $partnerCategory->id, 'slug' => 'aipo',                          'active' => true),
            array('name'=>'Dióxido de enxofre e sulfitos', 'category_id'=> $partnerCategory->id, 'slug' => 'dioxido-de-enxofre-e-sulfitos', 'active' => true),
        );
        
        Allergen::insert($data);
        
    }
}

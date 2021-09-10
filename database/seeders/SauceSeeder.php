<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Sauce;
use App\Models\PartnerCategory;

class SauceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partnerCategory = PartnerCategory::where('slug', 'restaurantes')->first();

        $data = array(
            array('name'=>'Maionese',  'category_id'=> $partnerCategory->id, 'slug' => 'maionese',  'active' => true),
            array('name'=>'Pesto',     'category_id'=> $partnerCategory->id, 'slug' => 'pesto',     'active' => true),
            array('name'=>'Vinagrete', 'category_id'=> $partnerCategory->id, 'slug' => 'vinagrete', 'active' => true),
            array('name'=>'Mostarda',  'category_id'=> $partnerCategory->id, 'slug' => 'mostarda',  'active' => true),
            array('name'=>'Holandês',  'category_id'=> $partnerCategory->id, 'slug' => 'holandês',  'active' => true),
            array('name'=>'Ketchup',   'category_id'=> $partnerCategory->id, 'slug' => 'ketchup',   'active' => true),
            array('name'=>'Picante',   'category_id'=> $partnerCategory->id, 'slug' => 'picante',   'active' => true),
        );
        
        Sauce::insert($data);
    }
}

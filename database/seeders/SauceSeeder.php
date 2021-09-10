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
        $restaurante = PartnerCategory::where('slug', 'restaurantes')->first();

        $data = array(
            array('name'=>'escabeiche',       'category_id'=> $restaurante->id, 'slug' => 'escabeiche',       'active' => true),
            array('name'=>'tomate',           'category_id'=> $restaurante->id, 'slug' => 'tomate',           'active' => true),
            array('name'=>'agridoce',         'category_id'=> $restaurante->id, 'slug' => 'agridoce',         'active' => true),
            array('name'=>'cervejeira',       'category_id'=> $restaurante->id, 'slug' => 'cervejeira',       'active' => true),
            array('name'=>'queijo',           'category_id'=> $restaurante->id, 'slug' => 'queijo',           'active' => true),
            array('name'=>'queijo rockfort',  'category_id'=> $restaurante->id, 'slug' => 'queijo-rockfort',  'active' => true),
            array('name'=>'4 queijos',        'category_id'=> $restaurante->id, 'slug' => '4-queijos',        'active' => true),
            array('name'=>'natas',            'category_id'=> $restaurante->id, 'slug' => 'natas',            'active' => true),
            array('name'=>'azeite',           'category_id'=> $restaurante->id, 'slug' => 'azeite',           'active' => true),
            array('name'=>'hollandaise',      'category_id'=> $restaurante->id, 'slug' => 'hollandaise',      'active' => true),
            array('name'=>'mostarda',         'category_id'=> $restaurante->id, 'slug' => 'mostarda',         'active' => true),
            array('name'=>'manteiga',         'category_id'=> $restaurante->id, 'slug' => 'manteiga',         'active' => true),
            array('name'=>'frutos vermelhos', 'category_id'=> $restaurante->id, 'slug' => 'frutos-vermelhos', 'active' => true),
            array('name'=>'pimentas',         'category_id'=> $restaurante->id, 'slug' => 'pimentas',         'active' => true),
            array('name'=>'3 pimentas',       'category_id'=> $restaurante->id, 'slug' => '3-pimentas',       'active' => true),
            array('name'=>'cebola',           'category_id'=> $restaurante->id, 'slug' => 'cebola',           'active' => true),
            array('name'=>'vinagrete',        'category_id'=> $restaurante->id, 'slug' => 'vinagrete',        'active' => true),
            array('name'=>'branco',           'category_id'=> $restaurante->id, 'slug' => 'branco',           'active' => true),
            array('name'=>'bechamel',         'category_id'=> $restaurante->id, 'slug' => 'bechamel',         'active' => true),
        );

        Sauce::insert($data);
    }
}

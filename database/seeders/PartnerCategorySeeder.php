<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PartnerCategory;

class PartnerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        #   Cria categoria Restaurante
        $restaurante = PartnerCategory::create([
            'name'      => 'Restaurantes',
            'slug'      => 'restaurantes',
            'parent_id' => null,
            'active'    => 1,
        ]);
        #   Subcategorias de restaurantes
        $data = array(
            array('name'=>'Oriental',   'parent_id'=> $restaurante->id, 'slug' => 'oriental',   'active' => true),
            array('name'=>'Brasileira', 'parent_id'=> $restaurante->id, 'slug' => 'brasileira', 'active' => true),
        );
        #   Cria Subcategorias de restaurantes
        PartnerCategory::insert($data);


        #   Cria categoria Supermercado
        $supermercado = PartnerCategory::create([
            'name'      => 'Supermercado',
            'slug'      => 'supernercado',
            'parent_id' => null,
            'active'    => 1,
        ]);
        #   Subcategorias de Supermercados
        $data = array(
            array('name'=>'Mercearia',                'parent_id'=> $supermercado->id, 'slug' => 'mercearia',               'active' => true),
            array('name'=>'Bio e Intolerâncias',      'parent_id'=> $supermercado->id, 'slug' => 'bio-e-intolerancias',     'active' => true),
            array('name'=>'Laticínios e Ovos',        'parent_id'=> $supermercado->id, 'slug' => 'laticinios-e-ovos',       'active' => true),
            array('name'=>'Peixaria e Talho',         'parent_id'=> $supermercado->id, 'slug' => 'peixaria-e-talho',        'active' => true),
            array('name'=>'Frutas e Legumes',         'parent_id'=> $supermercado->id, 'slug' => 'frutas-e-legumes',        'active' => true),
            array('name'=>'Charcutaria e Queijos',    'parent_id'=> $supermercado->id, 'slug' => 'charcutaria-e-queijos',   'active' => true),
            array('name'=>'Padaria e Pastelaria',     'parent_id'=> $supermercado->id, 'slug' => 'padaria-e-pastelaria',    'active' => true),
            array('name'=>'Congelados',               'parent_id'=> $supermercado->id, 'slug' => 'congelados',              'active' => true),
            array('name'=>'Bebidas e Garrafeira',     'parent_id'=> $supermercado->id, 'slug' => 'bebidas-e-garrafeira',    'active' => true),
            array('name'=>'Higiene e Beleza',         'parent_id'=> $supermercado->id, 'slug' => 'higiene-e-beleza',        'active' => true),
            array('name'=>'Bebé',                     'parent_id'=> $supermercado->id, 'slug' => 'bebe',                    'active' => true),
            array('name'=>'Limpeza',                  'parent_id'=> $supermercado->id, 'slug' => 'limpeza',                 'active' => true),
            array('name'=>'Casa, Bricolage e jardim', 'parent_id'=> $supermercado->id, 'slug' => 'casa-bricolage-e-jardim', 'active' => true),
            array('name'=>'Animais',                  'parent_id'=> $supermercado->id, 'slug' => 'animais',                 'active' => true),
            array('name'=>'Brinquedos e jogos',       'parent_id'=> $supermercado->id, 'slug' => 'brinquedos-e-jogos',      'active' => true),
            array('name'=>'Desporto e Ar livre',      'parent_id'=> $supermercado->id, 'slug' => 'desporto-e-ar-livre',     'active' => true),
            array('name'=>'Roupa, Calçado, Bagagens', 'parent_id'=> $supermercado->id, 'slug' => 'roupa-calcado-bagagens',  'active' => true),
            array('name'=>'Livraria e Papelaria',     'parent_id'=> $supermercado->id, 'slug' => 'livraria-e-papelaria',    'active' => true),
        );
        #   Cria Subcategorias de Supermercados
        PartnerCategory::insert($data);
    }
}

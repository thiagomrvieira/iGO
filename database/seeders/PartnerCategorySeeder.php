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


        
        #   Cria categoria Lojas
         $loja = PartnerCategory::create([
            'name'      => 'Lojas',
            'slug'      => 'lojas',
            'parent_id' => null,
            'active'    => 1,
        ]);
        #   Subcategorias de Lojas
        $data = array(
            array('name'=>'Artigos do Lar',                      'parent_id'=> $loja->id, 'slug' => 'artigos-do-lar',                     'active' => true),
            array('name'=>'Artigos de senhora',                  'parent_id'=> $loja->id, 'slug' => 'artigos-de-senhora',                 'active' => true),
            array('name'=>'Artigos de homem',                    'parent_id'=> $loja->id, 'slug' => 'artigos-de-homem',                   'active' => true),
            array('name'=>'Artigos de criança',                  'parent_id'=> $loja->id, 'slug' => 'artigos-de-crianca',                 'active' => true),
            array('name'=>'Tecnologias & Electrónicos',          'parent_id'=> $loja->id, 'slug' => 'tecnologias-&-electronicos',         'active' => true),
            array('name'=>'Artesanato e Roupa Africana',         'parent_id'=> $loja->id, 'slug' => 'artesanato-e-roupa-africana',        'active' => true),
            array('name'=>'Bebidas alcoólicas',                  'parent_id'=> $loja->id, 'slug' => 'bebidas-alcoolicas',                 'active' => true),
            array('name'=>'Bebidas sem álcool',                  'parent_id'=> $loja->id, 'slug' => 'bebidas-sem-alcool',                 'active' => true),
            array('name'=>'Artigos de Festa',                    'parent_id'=> $loja->id, 'slug' => 'artigos-de-festa',                   'active' => true),
            array('name'=>'Florista',                            'parent_id'=> $loja->id, 'slug' => 'florista',                           'active' => true),
            array('name'=>'Amor, momentos e ocasiões especiais', 'parent_id'=> $loja->id, 'slug' => 'amor-momentos-e-ocasioes-especiais', 'active' => true),
            array('name'=>'Artigos de higiene e biosegurança',   'parent_id'=> $loja->id, 'slug' => 'artigos-de-higiene-e-bioseguranca',  'active' => true),
            array('name'=>'Agro',                                'parent_id'=> $loja->id, 'slug' => 'agro',                               'active' => true),
           
        );
        #   Cria Subcategorias de Lojas
        PartnerCategory::insert($data);



        #   Cria categoria Farmácias
        $farmacia = PartnerCategory::create([
            'name'      => 'Farmácias',
            'slug'      => 'farmacias',
            'parent_id' => null,
            'active'    => 1,
        ]);
        #   Subcategorias de Farmácias
        $data = array(
            array('name'=>'Medicamentos sem prescrição médica', 'parent_id'=> $farmacia->id, 'slug' => 'medicamentos-sem-prescricao-medica', 'active' => true),
            array('name'=>'Adulto',                             'parent_id'=> $farmacia->id, 'slug' => 'adulto',                             'active' => true),
            array('name'=>'Criança',                            'parent_id'=> $farmacia->id, 'slug' => 'crianca',                            'active' => true),
        );
        #   Cria Subcategorias de Farmácias
        PartnerCategory::insert($data);
    }
}

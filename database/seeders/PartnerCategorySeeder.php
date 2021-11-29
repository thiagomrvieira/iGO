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
            'image'     => 'cat_comida',
            'active'    => 1,
        ]);
        #   Subcategorias de restaurantes
        $data = array(
            array('name'=>'Árabe',                'parent_id'=> $restaurante->id, 'slug' => 'arabe',                'image' => 'cat_arabe',         'active' => true),
            array('name'=>'Brasileira',           'parent_id'=> $restaurante->id, 'slug' => 'brasileira',           'image' => 'cat_brasileira',    'active' => true),
            array('name'=>'Da banda',             'parent_id'=> $restaurante->id, 'slug' => 'da_banda',             'image' => 'cat_da_banda',      'active' => true),
            array('name'=>'Gelados',              'parent_id'=> $restaurante->id, 'slug' => 'gelados',              'image' => 'cat_gelados',       'active' => true),
            array('name'=>'Hambúrgueres',         'parent_id'=> $restaurante->id, 'slug' => 'harmburgueres',        'image' => 'cat_hamburguer',    'active' => true),
            array('name'=>'Massas & Pizzas',      'parent_id'=> $restaurante->id, 'slug' => 'massas_e_pizzas',      'image' => 'cat_massas_pizzas', 'active' => true),
            array('name'=>'Petiscos & Lanches',   'parent_id'=> $restaurante->id, 'slug' => 'petiscos_e_lanches',   'image' => 'cat_petiscos',      'active' => true),
            array('name'=>'Matabixos & Brunch',   'parent_id'=> $restaurante->id, 'slug' => 'matabixos_e_brunch',   'image' => 'cat_matabixos',     'active' => true),
            array('name'=>'Portuguesa',           'parent_id'=> $restaurante->id, 'slug' => 'portuguesa',           'image' => 'cat_portuguesa',    'active' => true),
            array('name'=>'Resto do mundo',       'parent_id'=> $restaurante->id, 'slug' => 'resto_do_mundo',       'image' => 'cat_mundo',         'active' => true),
            array('name'=>'Sobremesas & Doces',   'parent_id'=> $restaurante->id, 'slug' => 'sobremesas_e_doces',   'image' => 'cat_sobremesa',     'active' => true),
            array('name'=>'Sumos & Batidos',      'parent_id'=> $restaurante->id, 'slug' => 'sumos_e_batidos',      'image' => 'cat_sumos_batidos', 'active' => true),
            array('name'=>'Oriental',             'parent_id'=> $restaurante->id, 'slug' => 'oriental',             'image' => 'cat_sushi',         'active' => true),
            array('name'=>'Vegetariana & Vegana', 'parent_id'=> $restaurante->id, 'slug' => 'vegetariana_e_vegana', 'image' => 'cat_vegetariana',   'active' => true),
        );
        #   Cria Subcategorias de restaurantes
        PartnerCategory::insert($data);



        #   Cria categoria Supermercado
        $supermercado = PartnerCategory::create([
            'name'      => 'Supermercados',
            'slug'      => 'supernercados',
            'parent_id' => null,
            'image'     => 'cat_supermercados',
            'active'    => 1,
        ]);
        #   Subcategorias de Supermercados
        $data = array(
            array('name'  => 'Mercearia',               'parent_id'=> $supermercado->id,    'slug'   => 'mercearia',               
                  'image' => 'supermercados/mercearia',           'active' => true),
            array('name'  => 'Bio e Intolerâncias',     'parent_id'=> $supermercado->id,    'slug'   => 'bio-e-intolerancias',     
                  'image' => 'supermercados/bio_intolerancias',   'active' => true),
            array('name'  => 'Laticínios e Ovos',       'parent_id'=> $supermercado->id,    'slug'   => 'laticinios-e-ovos',       
                  'image' => 'supermercados/laticinios_ovos',     'active' => true),
            array('name'  => 'Peixaria e Talho',         'parent_id'=> $supermercado->id,   'slug'   => 'peixaria-e-talho',        
                  'image' => 'supermercados/peixe_talho',         'active' => true),
            array('name'  => 'Frutas e Legumes',         'parent_id'=> $supermercado->id,   'slug'   => 'frutas-e-legumes',        
                  'image' => 'supermercados/frutas_legumes',      'active' => true),
            array('name'  => 'Charcutaria e Queijos',    'parent_id'=> $supermercado->id,   'slug'   => 'charcutaria-e-queijos',   
                  'image' => 'supermercados/queijo',              'active' => true),
            array('name'  => 'Padaria e Pastelaria',     'parent_id'=> $supermercado->id,   'slug'   => 'padaria-e-pastelaria',    
                  'image' => 'supermercados/padaria_pastelaria',  'active' => true),
            array('name'  => 'Congelados',               'parent_id'=> $supermercado->id,   'slug'   => 'congelados',              
                  'image' => 'supermercados/congelados',          'active' => true),
            array('name'  => 'Bebidas e Garrafeira',     'parent_id'=> $supermercado->id,   'slug'   => 'bebidas-e-garrafeira',    
                  'image' => 'supermercados/bebidas_garrafeira',  'active' => true),
            array('name'  => 'Higiene e Beleza',         'parent_id'=> $supermercado->id,   'slug'   => 'higiene-e-beleza',        
                  'image' => 'supermercados/higiene_beleza',      'active' => true),
            array('name'  => 'Bebé',                     'parent_id'=> $supermercado->id,   'slug'   => 'bebe',                    
                  'image' => 'supermercados/bebe',                'active' => true),
            array('name'  => 'Limpeza',                  'parent_id'=> $supermercado->id,   'slug'   => 'limpeza',                 
                  'image' => 'supermercados/limpeza',             'active' => true),
            array('name'  => 'Casa, Bricolage e jardim', 'parent_id'=> $supermercado->id,   'slug'   => 'casa-bricolage-e-jardim', 
                  'image' => 'supermercados/casa_bricolage',      'active' => true),
            array('name'  => 'Animais',                  'parent_id'=> $supermercado->id,   'slug'   => 'animais',                 
                  'image' => 'supermercados/animais',             'active' => true),
            array('name'  => 'Brinquedos e jogos',       'parent_id'=> $supermercado->id,   'slug'   => 'brinquedos-e-jogos',      
                  'image' => 'supermercados/brinquedos',          'active' => true),
            array('name'  => 'Desporto e Ar livre',      'parent_id'=> $supermercado->id,   'slug'   => 'desporto-e-ar-livre',     
                  'image' => 'supermercados/desporto',            'active' => true),
            array('name'  => 'Roupa, Calçado, Bagagens', 'parent_id'=> $supermercado->id,   'slug'   => 'roupa-calcado-bagagens',  
                  'image' => 'supermercados/roupa',               'active' => true),
            array('name'  => 'Livraria e Papelaria',     'parent_id'=> $supermercado->id,   'slug'   => 'livraria-e-papelaria',    
                  'image' => 'supermercados/livraria_papelaria',  'active' => true),
        );
        #   Cria Subcategorias de Supermercados
        PartnerCategory::insert($data);


        
        #   Cria categoria Lojas
        $loja = PartnerCategory::create([
            'name'      => 'Lojas',
            'slug'      => 'lojas',
            'parent_id' => null,
            'image'     => 'cat_lojas',
            'active'    => 1,
        ]);
        #   Subcategorias de Lojas
        $data = array(
            array('name'  => 'Artigos do Lar',                      'parent_id'=> $loja->id, 'slug'   => 'artigos-do-lar',                     
                  'image' => 'lojas/artigos_lar',                  'active' => true),
            array('name'  => 'Artigos de senhora',                  'parent_id'=> $loja->id, 'slug'   => 'artigos-de-senhora',                 
                  'image' => 'lojas/artigos_senhora',              'active' => true),
            array('name'  => 'Artigos de homem',                    'parent_id'=> $loja->id, 'slug'   => 'artigos-de-homem',                   
                  'image' => 'lojas/artigos_homem',                'active' => true),
            array('name'  => 'Artigos de criança',                  'parent_id'=> $loja->id, 'slug'   => 'artigos-de-crianca',                 
                  'image' => 'lojas/artigos_criança',              'active' => true),
            array('name'  => 'Tecnologias & Electrónicos',          'parent_id'=> $loja->id, 'slug'   => 'tecnologias-&-electronicos',         
                  'image' => 'lojas/tecnologia',                   'active' => true),
            array('name'  => 'Artesanato e Roupa Africana',         'parent_id'=> $loja->id, 'slug'   => 'artesanato-e-roupa-africana',        
                  'image' => 'lojas/artesanato',                   'active' => true),
            array('name'  => 'Bebidas alcoólicas',                  'parent_id'=> $loja->id, 'slug'   => 'bebidas-alcoolicas',                 
                  'image' => 'lojas/bebidas_alcoolicas',           'active' => true),
            array('name'  => 'Bebidas sem álcool',                  'parent_id'=> $loja->id, 'slug'   => 'bebidas-sem-alcool',                 
                  'image' => 'lojas/bebidas_sem_alcool',           'active' => true),
            array('name'  => 'Artigos de Festa',                    'parent_id'=> $loja->id, 'slug'   => 'artigos-de-festa',                   
                  'image' => 'lojas/artigos_festa',                'active' => true),
            array('name'  => 'Florista',                            'parent_id'=> $loja->id, 'slug'   => 'florista',                           
                  'image' => 'lojas/florista',                     'active' => true),
            array('name'  => 'Amor, momentos e ocasiões especiais', 'parent_id'=> $loja->id, 'slug'   => 'amor-momentos-e-ocasioes-especiais', 
                  'image' => 'lojas/amor_ocasioes',                'active' => true),
            array('name'  => 'Artigos de higiene e biosegurança',   'parent_id'=> $loja->id, 'slug'   => 'artigos-de-higiene-e-bioseguranca',  
                  'image' => 'lojas/artigos_higiene',              'active' => true),
            array('name'  => 'Agro',                                'parent_id'=> $loja->id, 'slug'   => 'agro',                               
                  'image' => 'lojas/agro',                         'active' => true),
           
        );
        #   Cria Subcategorias de Lojas
        PartnerCategory::insert($data);


        #   Cria categoria Farmácias
        $farmacia = PartnerCategory::create([
            'name'      => 'Farmácias',
            'slug'      => 'farmacias',
            'parent_id' => null,
            'image'     => 'checkout_farmacias',
            'active'    => 1,
        ]);
        #   Subcategorias de Farmácias
        $data = array(
            // array('name'  => 'Medicamentos sem prescrição médica',           'parent_id'=> $farmacia->id, 'slug' => 'medicamentos-sem-prescricao-medica', 
            //       'image' => 'checkout_farmacias', 'active'   => true),
            array('name'  => 'Adulto',                                       'parent_id'=> $farmacia->id, 'slug' => 'adulto',                             
                  'image' => 'farmacias/adulto',             'active'   => true),
            array('name'  => 'Criança',                                      'parent_id'=> $farmacia->id, 'slug' => 'crianca',                            
                  'image' => 'farmacias/crianca',            'active'   => true),
        );
        #   Cria Subcategorias de Farmácias
        PartnerCategory::insert($data);
    }
}

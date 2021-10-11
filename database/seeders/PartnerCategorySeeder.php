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
            'image'     => 'storage/assets-mobile/cat_comida.svg',
            'active'    => 1,
        ]);
        #   Subcategorias de restaurantes
        $data = array(
            array('name'=>'Árabe',                'parent_id'=> $restaurante->id, 'slug' => 'arabe',                'image' => 'storage/assets-mobile/cat_arabe.svg',         'active' => true),
            array('name'=>'Brasileira',           'parent_id'=> $restaurante->id, 'slug' => 'brasileira',           'image' => 'storage/assets-mobile/cat_brasileira.svg',    'active' => true),
            array('name'=>'Da banda',             'parent_id'=> $restaurante->id, 'slug' => 'da_banda',             'image' => 'storage/assets-mobile/cat_da_banda.svg',      'active' => true),
            array('name'=>'Gelados',              'parent_id'=> $restaurante->id, 'slug' => 'gelados',              'image' => 'storage/assets-mobile/cat_gelados.svg',       'active' => true),
            array('name'=>'Hambúrgueres',         'parent_id'=> $restaurante->id, 'slug' => 'harmburgueres',        'image' => 'storage/assets-mobile/cat_hamburguer.svg',    'active' => true),
            array('name'=>'Massas & Pizzas',      'parent_id'=> $restaurante->id, 'slug' => 'massas_e_pizzas',      'image' => 'storage/assets-mobile/cat_massas_pizzas.svg', 'active' => true),
            array('name'=>'Petiscos & Lanches',   'parent_id'=> $restaurante->id, 'slug' => 'petiscos_e_lanches',   'image' => 'storage/assets-mobile/cat_petiscos.svg',      'active' => true),
            array('name'=>'Matabixos & Brunch',   'parent_id'=> $restaurante->id, 'slug' => 'matabixos_e_brunch',   'image' => 'storage/assets-mobile/cat_matabixos.svg',     'active' => true),
            array('name'=>'Portuguesa',           'parent_id'=> $restaurante->id, 'slug' => 'portuguesa',           'image' => 'storage/assets-mobile/cat_portuguesa.svg',    'active' => true),
            array('name'=>'Resto do mundo',       'parent_id'=> $restaurante->id, 'slug' => 'resto_do_mundo',       'image' => 'storage/assets-mobile/cat_mundo.svg',         'active' => true),
            array('name'=>'Sobremesas & Doces',   'parent_id'=> $restaurante->id, 'slug' => 'sobremesas_e_doces',   'image' => 'storage/assets-mobile/cat_sobremesa.svg',     'active' => true),
            array('name'=>'Sumos & Batidos',      'parent_id'=> $restaurante->id, 'slug' => 'sumos_e_batidos',      'image' => 'storage/assets-mobile/cat_sumos_batidos.svg', 'active' => true),
            array('name'=>'Oriental',             'parent_id'=> $restaurante->id, 'slug' => 'oriental',             'image' => 'storage/assets-mobile/cat_sushi.svg',         'active' => true),
            array('name'=>'Vegetariana & Vegana', 'parent_id'=> $restaurante->id, 'slug' => 'vegetariana_e_vegana', 'image' => 'storage/assets-mobile/cat_vegetariana.svg',   'active' => true),
        );
        #   Cria Subcategorias de restaurantes
        PartnerCategory::insert($data);



        #   Cria categoria Supermercado
        $supermercado = PartnerCategory::create([
            'name'      => 'Supermercado',
            'slug'      => 'supernercado',
            'parent_id' => null,
            'image'     => 'storage/assets-mobile/cat_supermercados.svg',
            'active'    => 1,
        ]);
        #   Subcategorias de Supermercados
        $data = array(
            array('name'  => 'Mercearia',               'parent_id'=> $supermercado->id,    'slug'   => 'mercearia',               
                  'image' => 'storage/assets-mobile/supermercados/mercearia.png',           'active' => true),
            array('name'  => 'Bio e Intolerâncias',     'parent_id'=> $supermercado->id,    'slug'   => 'bio-e-intolerancias',     
                  'image' => 'storage/assets-mobile/supermercados/bio_intolerancias.png',   'active' => true),
            array('name'  => 'Laticínios e Ovos',       'parent_id'=> $supermercado->id,    'slug'   => 'laticinios-e-ovos',       
                  'image' => 'storage/assets-mobile/supermercados/laticinios_ovos.png',     'active' => true),
            array('name'  => 'Peixaria e Talho',         'parent_id'=> $supermercado->id,   'slug'   => 'peixaria-e-talho',        
                  'image' => 'storage/assets-mobile/supermercados/peixe_talho.png',         'active' => true),
            array('name'  => 'Frutas e Legumes',         'parent_id'=> $supermercado->id,   'slug'   => 'frutas-e-legumes',        
                  'image' => 'storage/assets-mobile/supermercados/frutas_legumes.png',      'active' => true),
            array('name'  => 'Charcutaria e Queijos',    'parent_id'=> $supermercado->id,   'slug'   => 'charcutaria-e-queijos',   
                  'image' => 'storage/assets-mobile/supermercados/queijo.png',              'active' => true),
            array('name'  => 'Padaria e Pastelaria',     'parent_id'=> $supermercado->id,   'slug'   => 'padaria-e-pastelaria',    
                  'image' => 'storage/assets-mobile/supermercados/padaria_pastelaria.png',  'active' => true),
            array('name'  => 'Congelados',               'parent_id'=> $supermercado->id,   'slug'   => 'congelados',              
                  'image' => 'storage/assets-mobile/supermercados/congelados.png',          'active' => true),
            array('name'  => 'Bebidas e Garrafeira',     'parent_id'=> $supermercado->id,   'slug'   => 'bebidas-e-garrafeira',    
                  'image' => 'storage/assets-mobile/supermercados/bebidas_garrafeira.png',  'active' => true),
            array('name'  => 'Higiene e Beleza',         'parent_id'=> $supermercado->id,   'slug'   => 'higiene-e-beleza',        
                  'image' => 'storage/assets-mobile/supermercados/higiene_beleza.png',      'active' => true),
            array('name'  => 'Bebé',                     'parent_id'=> $supermercado->id,   'slug'   => 'bebe',                    
                  'image' => 'storage/assets-mobile/supermercados/bebe.png',                'active' => true),
            array('name'  => 'Limpeza',                  'parent_id'=> $supermercado->id,   'slug'   => 'limpeza',                 
                  'image' => 'storage/assets-mobile/supermercados/limpeza.png',             'active' => true),
            array('name'  => 'Casa, Bricolage e jardim', 'parent_id'=> $supermercado->id,   'slug'   => 'casa-bricolage-e-jardim', 
                  'image' => 'storage/assets-mobile/supermercados/casa_bricolage.png',      'active' => true),
            array('name'  => 'Animais',                  'parent_id'=> $supermercado->id,   'slug'   => 'animais',                 
                  'image' => 'storage/assets-mobile/supermercados/animais.png',             'active' => true),
            array('name'  => 'Brinquedos e jogos',       'parent_id'=> $supermercado->id,   'slug'   => 'brinquedos-e-jogos',      
                  'image' => 'storage/assets-mobile/supermercados/brinquedos.png',          'active' => true),
            array('name'  => 'Desporto e Ar livre',      'parent_id'=> $supermercado->id,   'slug'   => 'desporto-e-ar-livre',     
                  'image' => 'storage/assets-mobile/supermercados/desporto.png',            'active' => true),
            array('name'  => 'Roupa, Calçado, Bagagens', 'parent_id'=> $supermercado->id,   'slug'   => 'roupa-calcado-bagagens',  
                  'image' => 'storage/assets-mobile/supermercados/roupa.png',               'active' => true),
            array('name'  => 'Livraria e Papelaria',     'parent_id'=> $supermercado->id,   'slug'   => 'livraria-e-papelaria',    
                  'image' => 'storage/assets-mobile/supermercados/livraria_papelaria.png',  'active' => true),
        );
        #   Cria Subcategorias de Supermercados
        PartnerCategory::insert($data);


        
        #   Cria categoria Lojas
        $loja = PartnerCategory::create([
            'name'      => 'Lojas',
            'slug'      => 'lojas',
            'parent_id' => null,
            'image'     => 'storage/assets-mobile/cat_lojas.svg',
            'active'    => 1,
        ]);
        #   Subcategorias de Lojas
        $data = array(
            array('name'  => 'Artigos do Lar',                      'parent_id'=> $loja->id, 'slug'   => 'artigos-do-lar',                     
                  'image' => 'storage/assets-mobile/lojas/artigos_lar.png',                  'active' => true),
            array('name'  => 'Artigos de senhora',                  'parent_id'=> $loja->id, 'slug'   => 'artigos-de-senhora',                 
                  'image' => 'storage/assets-mobile/lojas/artigos_senhora.png',              'active' => true),
            array('name'  => 'Artigos de homem',                    'parent_id'=> $loja->id, 'slug'   => 'artigos-de-homem',                   
                  'image' => 'storage/assets-mobile/lojas/artigos_homem.png',                'active' => true),
            array('name'  => 'Artigos de criança',                  'parent_id'=> $loja->id, 'slug'   => 'artigos-de-crianca',                 
                  'image' => 'storage/assets-mobile/lojas/artigos_criança.png',              'active' => true),
            array('name'  => 'Tecnologias & Electrónicos',          'parent_id'=> $loja->id, 'slug'   => 'tecnologias-&-electronicos',         
                  'image' => 'storage/assets-mobile/lojas/tecnologia.png',                   'active' => true),
            array('name'  => 'Artesanato e Roupa Africana',         'parent_id'=> $loja->id, 'slug'   => 'artesanato-e-roupa-africana',        
                  'image' => 'storage/assets-mobile/lojas/artesanato.png',                   'active' => true),
            array('name'  => 'Bebidas alcoólicas',                  'parent_id'=> $loja->id, 'slug'   => 'bebidas-alcoolicas',                 
                  'image' => 'storage/assets-mobile/lojas/bebidas_alcoolicas.png',           'active' => true),
            array('name'  => 'Bebidas sem álcool',                  'parent_id'=> $loja->id, 'slug'   => 'bebidas-sem-alcool',                 
                  'image' => 'storage/assets-mobile/lojas/bebidas_sem_alcool.png',           'active' => true),
            array('name'  => 'Artigos de Festa',                    'parent_id'=> $loja->id, 'slug'   => 'artigos-de-festa',                   
                  'image' => 'storage/assets-mobile/lojas/artigos_festa.png',                'active' => true),
            array('name'  => 'Florista',                            'parent_id'=> $loja->id, 'slug'   => 'florista',                           
                  'image' => 'storage/assets-mobile/lojas/florista.png',                     'active' => true),
            array('name'  => 'Amor, momentos e ocasiões especiais', 'parent_id'=> $loja->id, 'slug'   => 'amor-momentos-e-ocasioes-especiais', 
                  'image' => 'storage/assets-mobile/lojas/amor_ocasioes.png',                'active' => true),
            array('name'  => 'Artigos de higiene e biosegurança',   'parent_id'=> $loja->id, 'slug'   => 'artigos-de-higiene-e-bioseguranca',  
                  'image' => 'storage/assets-mobile/lojas/artigos_higiene.png',              'active' => true),
            array('name'  => 'Agro',                                'parent_id'=> $loja->id, 'slug'   => 'agro',                               
                  'image' => 'storage/assets-mobile/lojas/agro.png',                         'active' => true),
           
        );
        #   Cria Subcategorias de Lojas
        PartnerCategory::insert($data);


        #   Cria categoria Farmácias
        $farmacia = PartnerCategory::create([
            'name'      => 'Farmácias',
            'slug'      => 'farmacias',
            'parent_id' => null,
            'image'     => 'storage/assets-mobile/checkout_farmacias.svg',
            'active'    => 1,
        ]);
        #   Subcategorias de Farmácias
        $data = array(
            // array('name'  => 'Medicamentos sem prescrição médica',           'parent_id'=> $farmacia->id, 'slug' => 'medicamentos-sem-prescricao-medica', 
            //       'image' => 'storage/assets-mobile/checkout_farmacias.svg', 'active'   => true),
            array('name'  => 'Adulto',                                       'parent_id'=> $farmacia->id, 'slug' => 'adulto',                             
                  'image' => 'storage/assets-mobile/adulto.png',             'active'   => true),
            array('name'  => 'Criança',                                      'parent_id'=> $farmacia->id, 'slug' => 'crianca',                            
                  'image' => 'storage/assets-mobile/crianca.png',            'active'   => true),
        );
        #   Cria Subcategorias de Farmácias
        PartnerCategory::insert($data);
    }
}

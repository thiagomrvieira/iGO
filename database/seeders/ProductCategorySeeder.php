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
        $restaurantes = PartnerCategory::where('slug', 'restaurantes')->first();
        $mercearia    = PartnerCategory::where('slug', 'mercearia')->first();
        $bio          = PartnerCategory::where('slug', 'bio-e-intolerancias')->first();
        $laticinios   = PartnerCategory::where('slug', 'laticinios-e-ovos')->first();
        $peixaria     = PartnerCategory::where('slug', 'peixaria-e-talho')->first();
        $frutas       = PartnerCategory::where('slug', 'frutas-e-legumes')->first();
        $charcutaria  = PartnerCategory::where('slug', 'charcutaria-e-queijos')->first();
        $padaria      = PartnerCategory::where('slug', 'padaria-e-pastelaria')->first();
        $congelados   = PartnerCategory::where('slug', 'congelados')->first();
        $bebidas      = PartnerCategory::where('slug', 'bebidas-e-garrafeira')->first();
        $higiene      = PartnerCategory::where('slug', 'higiene-e-beleza')->first();
        $bebe         = PartnerCategory::where('slug', 'bebe')->first();
        $limpeza      = PartnerCategory::where('slug', 'limpeza')->first();
        $casa         = PartnerCategory::where('slug', 'casa-bricolage-e-jardim')->first();
        $animais      = PartnerCategory::where('slug', 'animais')->first();
        $brinquedos   = PartnerCategory::where('slug', 'brinquedos-e-jogos')->first();
        $desporto     = PartnerCategory::where('slug', 'desporto-e-ar-livre')->first();
        $roupa        = PartnerCategory::where('slug', 'roupa-calcado-bagagens')->first();
        $livraria     = PartnerCategory::where('slug', 'livraria-e-papelaria')->first();
        $farmacia     = PartnerCategory::where('slug', 'farmacias')->first();

        $data = array(

            array('name' => 'Entradas',          'partner_category_id' => $restaurantes->id, 'slug' => 'entradas',          'active' => true),
            array('name' => 'Pratos principais', 'partner_category_id' => $restaurantes->id, 'slug' => 'pratos-principais', 'active' => true),
            array('name' => 'Sobremesas',        'partner_category_id' => $restaurantes->id, 'slug' => 'sobremesas',        'active' => true),
            array('name' => 'Bebidas',           'partner_category_id' => $restaurantes->id, 'slug' => 'bebidas',           'active' => true),

            array('name' => 'Arroz, Massas e Farinhas',         'partner_category_id' => $mercearia->id, 'slug' => 'arroz-massas-e-farinhas',         'active' => true),
            array('name' => 'Azeite, ??leo e Vinagre',           'partner_category_id' => $mercearia->id, 'slug' => 'azeite-oleo-e-vinagre',           'active' => true),
            array('name' => 'Batata Frita e Snacks',            'partner_category_id' => $mercearia->id, 'slug' => 'batata-frita-e-snacks',           'active' => true),
            array('name' => 'Conservas e Salsicha',             'partner_category_id' => $mercearia->id, 'slug' => 'conservas-e-salsicha',            'active' => true),
            array('name' => 'Molhos, Temperos e Sal',           'partner_category_id' => $mercearia->id, 'slug' => 'molhos-tempero-e-sal',            'active' => true),
            array('name' => 'Sopas',                            'partner_category_id' => $mercearia->id, 'slug' => 'sopas',                           'active' => true),
            array('name' => 'Tomate, Feij??o e Gr??o',            'partner_category_id' => $mercearia->id, 'slug' => 'tomate-feijao-e-grao',            'active' => true),
            array('name' => 'Alimenta????o infantil',             'partner_category_id' => $mercearia->id, 'slug' => 'alimentacao-infantil',            'active' => true),
            array('name' => 'A??ucar, Doces e Mel',              'partner_category_id' => $mercearia->id, 'slug' => 'acucar-doces-e-mel',              'active' => true),
            array('name' => 'Barras e Cereais',                 'partner_category_id' => $mercearia->id, 'slug' => 'barras-e-cereais',                'active' => true),
            array('name' => 'Bolachas, Bolos e Tostas',         'partner_category_id' => $mercearia->id, 'slug' => 'bolachas-bolos-e-tostas',         'active' => true),
            array('name' => 'Do??aria, Chocolates e Sobremesas', 'partner_category_id' => $mercearia->id, 'slug' => 'docaria-chocolates-e-sobremesas', 'active' => true),
            
            array('name' => 'Biol??gicos',                  'partner_category_id' => $bio->id, 'slug' => 'biologicos',                  'active' => true),
            array('name' => 'Sem Lactose',                 'partner_category_id' => $bio->id, 'slug' => 'sem-lactose',                 'active' => true),
            array('name' => 'Sem Gl??ten',                  'partner_category_id' => $bio->id, 'slug' => 'sem-gluten',                  'active' => true),
            array('name' => 'Vegano e Vegetariano',        'partner_category_id' => $bio->id, 'slug' => 'vegano-e-vegetariano',        'active' => true),
            array('name' => 'Barras e Cereais',            'partner_category_id' => $bio->id, 'slug' => 'barras-e-cereais',            'active' => true),
            array('name' => 'Nutri????o desportiva',         'partner_category_id' => $bio->id, 'slug' => 'nutricao-esportiva',          'active' => true),
            array('name' => 'Suplementos alimentares',     'partner_category_id' => $bio->id, 'slug' => 'suplementos-alimentares',     'active' => true),
            array('name' => 'Bebidas',                     'partner_category_id' => $bio->id, 'slug' => 'bebidas',                     'active' => true),
            array('name' => 'Frutas e Legumes biologicos', 'partner_category_id' => $bio->id, 'slug' => 'frutas-e-legumes-biologicos', 'active' => true),
            array('name' => 'Ch??s, Infus??es e caf??s',      'partner_category_id' => $bio->id, 'slug' => 'chas-infusoes-e-cafes',       'active' => true),
            
            array('name' => 'Leite',                       'partner_category_id' => $laticinios->id, 'slug' => 'leite',                       'active' => true),
            array('name' => 'Iogurtes',                    'partner_category_id' => $laticinios->id, 'slug' => 'iogurtes',                    'active' => true),
            array('name' => 'Gelatinas e sobremesas',      'partner_category_id' => $laticinios->id, 'slug' => 'gelatinas-e-sobremesas',      'active' => true),
            array('name' => 'Manteigas e Cremes vegetais', 'partner_category_id' => $laticinios->id, 'slug' => 'manteigas-e-cremes-vegetais', 'active' => true),
            array('name' => 'Natas e Bechamel',            'partner_category_id' => $laticinios->id, 'slug' => 'natas-e-bechamel',            'active' => true),
            array('name' => 'Ovos',                        'partner_category_id' => $laticinios->id, 'slug' => 'ovos',                        'active' => true),
            array('name' => 'Bebidas vegetais',            'partner_category_id' => $laticinios->id, 'slug' => 'bebidas-vegetais',            'active' => true),
            array('name' => 'Queijos',                     'partner_category_id' => $laticinios->id, 'slug' => 'queijos',                     'active' => true),
           
            array('name' => 'Peixe fresco',                   'partner_category_id' => $peixaria->id, 'slug' => 'peixe-fresco',                   'active' => true),
            array('name' => 'Peixe congelado',                'partner_category_id' => $peixaria->id, 'slug' => 'peixe-congelado',                'active' => true),
            array('name' => 'Bacalhau',                       'partner_category_id' => $peixaria->id, 'slug' => 'bacalhau',                       'active' => true),
            array('name' => 'Marisco',                        'partner_category_id' => $peixaria->id, 'slug' => 'marisco',                        'active' => true),
            array('name' => 'Polvo, Lulas e Chocos',          'partner_category_id' => $peixaria->id, 'slug' => 'polvo-lulas-e-chocos',           'active' => true),
            array('name' => 'Salm??o Fumado e Especialidades', 'partner_category_id' => $peixaria->id, 'slug' => 'salmao-fumado-e-especialidades', 'active' => true),
            array('name' => 'Frango',                         'partner_category_id' => $peixaria->id, 'slug' => 'frango',                         'active' => true),
            array('name' => 'Novilho, Vitela e Vitel??o',      'partner_category_id' => $peixaria->id, 'slug' => 'novilho-vitela-e-vitelao',       'active' => true),
            array('name' => 'Porco',                          'partner_category_id' => $peixaria->id, 'slug' => 'porco',                          'active' => true),
            array('name' => 'Per??, Pato e Coelho',            'partner_category_id' => $peixaria->id, 'slug' => 'peru-pato-e-coelho',             'active' => true),
            array('name' => 'Borrego e Cabrito',              'partner_category_id' => $peixaria->id, 'slug' => 'borrego-e-cabrito',              'active' => true),
            array('name' => 'Picados e Especialidades',       'partner_category_id' => $peixaria->id, 'slug' => 'picados-e-especialidades',       'active' => true),
            
            array('name' => 'Frutas',                      'partner_category_id' => $frutas->id, 'slug' => 'frutas',                      'active' => true),
            array('name' => 'Legumes',                     'partner_category_id' => $frutas->id, 'slug' => 'legumes',                     'active' => true),
            array('name' => 'Frutas e Legumes biologicos', 'partner_category_id' => $frutas->id, 'slug' => 'frutas-e-legumes-biologicos', 'active' => true),
            array('name' => 'Frutos secos',                'partner_category_id' => $frutas->id, 'slug' => 'frutos-secos',                'active' => true),
            array('name' => 'Tremo??os e azeitonas',        'partner_category_id' => $frutas->id, 'slug' => 'tremocos-e-azeitonas',        'active' => true),
            
            array('name' => 'Mortadela, salame e paio',   'partner_category_id' => $charcutaria->id, 'slug' => 'mortadela-salame-e-paio',    'active' => true),
            array('name' => 'Enchidos',                   'partner_category_id' => $charcutaria->id, 'slug' => 'enchidos',                   'active' => true),
            array('name' => 'Fiambre',                    'partner_category_id' => $charcutaria->id, 'slug' => 'fiambre',                    'active' => true),
            array('name' => 'Presunto e bacon',           'partner_category_id' => $charcutaria->id, 'slug' => 'presunto-e-bacon',           'active' => true),
            array('name' => 'Salsichas',                  'partner_category_id' => $charcutaria->id, 'slug' => 'salsichas',                  'active' => true),
            array('name' => 'Queijo barrar e fundido',    'partner_category_id' => $charcutaria->id, 'slug' => 'queijo-barrar-e-fundido',    'active' => true),
            array('name' => 'Queijo bola e fatiado',      'partner_category_id' => $charcutaria->id, 'slug' => 'queijo-bola-e-fatiado',      'active' => true),
            array('name' => 'Queijo regional e corrente', 'partner_category_id' => $charcutaria->id, 'slug' => 'queijo-regional-e-corrente', 'active' => true),
            array('name' => 'Queijos gourmet',            'partner_category_id' => $charcutaria->id, 'slug' => 'queijos-gourmet',            'active' => true),
            array('name' => 'Queijo fresco e requeij??o',  'partner_category_id' => $charcutaria->id, 'slug' => 'queijo-fresco-e-requeijao',  'active' => true),
            array('name' => 'Queijo light e sem lactose', 'partner_category_id' => $charcutaria->id, 'slug' => 'queijo-light-e-sem-lactose', 'active' => true),
            array('name' => 'snacks de queijo',           'partner_category_id' => $charcutaria->id, 'slug' => 'snacks-de-queijo',           'active' => true),
            
            array('name' => 'P??o fresco e broa',                'partner_category_id' => $padaria->id, 'slug' => 'pao-fresco-e-broa',               'active' => true),
            array('name' => 'P??o de forma',                     'partner_category_id' => $padaria->id, 'slug' => 'pao-de-forma',                    'active' => true),
            array('name' => 'P??o cachorro, hamburgers e wraps', 'partner_category_id' => $padaria->id, 'slug' => 'pao-cachorro-hamburgers-e-wraps', 'active' => true),
            array('name' => 'Tostas e Croissants',              'partner_category_id' => $padaria->id, 'slug' => 'tostas-e-croissants',             'active' => true),
            array('name' => 'Bolos',                            'partner_category_id' => $padaria->id, 'slug' => 'bolos',                           'active' => true),
            array('name' => 'Biscoitos e Bolachas',             'partner_category_id' => $padaria->id, 'slug' => 'biscoitos-e-bolachas',            'active' => true),
            array('name' => 'Pastelaria variada',               'partner_category_id' => $padaria->id, 'slug' => 'pastelaria-variada',              'active' => true),
            
            array('name' => 'Douradinhos e Nuggets',     'partner_category_id' => $congelados->id, 'slug' => 'douradinhos-e-nuggets',     'active' => true),
            array('name' => 'Pizzas',                    'partner_category_id' => $congelados->id, 'slug' => 'pizzas',                    'active' => true),
            array('name' => 'Hamburgers e Refei????es',    'partner_category_id' => $congelados->id, 'slug' => 'hamburgers-e-refei????es',    'active' => true),
            array('name' => 'Salgados e aperetivos',     'partner_category_id' => $congelados->id, 'slug' => 'salgados-e-aperetivos',     'active' => true),
            array('name' => 'Vegetais e frutas',         'partner_category_id' => $congelados->id, 'slug' => 'vegetais-e-frutas',         'active' => true),
            array('name' => 'Carne Congelada',           'partner_category_id' => $congelados->id, 'slug' => 'carne-congelada',           'active' => true),
            array('name' => 'Peixe e Marisco congelado', 'partner_category_id' => $congelados->id, 'slug' => 'peixe-e-marisco-congelado', 'active' => true),
            array('name' => 'Gelados e Sobremesas',      'partner_category_id' => $congelados->id, 'slug' => 'gelados-e-sobremesas',      'active' => true),
            
            array('name' => '??gua',                     'partner_category_id' => $bebidas->id, 'slug' => 'agua',                     'active' => true),
            array('name' => 'Refrigerante',             'partner_category_id' => $bebidas->id, 'slug' => 'refrigerante',             'active' => true),
            array('name' => 'Sumos e Nectares',         'partner_category_id' => $bebidas->id, 'slug' => 'sumos-e-nectares',         'active' => true),
            array('name' => 'Cervejas e Sidras',        'partner_category_id' => $bebidas->id, 'slug' => 'cervejas-e-sidras',        'active' => true),
            array('name' => 'Vinho',                    'partner_category_id' => $bebidas->id, 'slug' => 'vinho',                    'active' => true),
            array('name' => 'Cabazes de Vinho',         'partner_category_id' => $bebidas->id, 'slug' => 'cabazes-de-vinho',         'active' => true),
            array('name' => 'Vinho do Porto',           'partner_category_id' => $bebidas->id, 'slug' => 'vinho-do-porto',           'active' => true),
            array('name' => 'Vinho Moscatel e Madeira', 'partner_category_id' => $bebidas->id, 'slug' => 'vinho-moscatel-e-madeira', 'active' => true),
            array('name' => 'Whisky',                   'partner_category_id' => $bebidas->id, 'slug' => 'whisky',                   'active' => true),
            array('name' => 'Gin e Vodka',              'partner_category_id' => $bebidas->id, 'slug' => 'gin-e-vodka',              'active' => true),
            array('name' => 'Rum e Tequila',            'partner_category_id' => $bebidas->id, 'slug' => 'rum-e-tequila',            'active' => true),
            array('name' => 'Cacha??a e Aguardente',     'partner_category_id' => $bebidas->id, 'slug' => 'cachaca-e-aguardente',     'active' => true),
            array('name' => 'Licores e Aperetivos',     'partner_category_id' => $bebidas->id, 'slug' => 'licores-e-aperitivos',     'active' => true),
            array('name' => 'Champagne e Espumante',    'partner_category_id' => $bebidas->id, 'slug' => 'champagne-e-espumante',    'active' => true),
            array('name' => 'Acess??rios de garrafeira', 'partner_category_id' => $bebidas->id, 'slug' => 'acessorios-de-garrafeira', 'active' => true),
            
            array('name' => 'Cabelo',                     'partner_category_id' => $higiene->id, 'slug' => 'cabelo',                     'active' => true),
            array('name' => 'Corpo',                      'partner_category_id' => $higiene->id, 'slug' => 'corpo',                      'active' => true),
            array('name' => 'Rosto',                      'partner_category_id' => $higiene->id, 'slug' => 'rosto',                      'active' => true),
            array('name' => 'Higiene Oral',               'partner_category_id' => $higiene->id, 'slug' => 'higiene-oral',               'active' => true),
            array('name' => 'Solares e Bronzeadores',     'partner_category_id' => $higiene->id, 'slug' => 'solares-e-bronzeadores',     'active' => true),
            array('name' => 'Produtos para homem',        'partner_category_id' => $higiene->id, 'slug' => 'produtos-para-homem',        'active' => true),
            array('name' => 'Maquilhagem e vernizes',     'partner_category_id' => $higiene->id, 'slug' => 'maquilhagem-e-vernizes',     'active' => true),
            array('name' => 'perfumes e conjuntos',       'partner_category_id' => $higiene->id, 'slug' => 'perfumes-e-conjuntos',       'active' => true),
            array('name' => 'Higiene ??ntima',             'partner_category_id' => $higiene->id, 'slug' => 'higiene-intima',             'active' => true),
            array('name' => 'Incontin??ncia',              'partner_category_id' => $higiene->id, 'slug' => 'incontinencia',              'active' => true),
            array('name' => 'Preservativos e acessorios', 'partner_category_id' => $higiene->id, 'slug' => 'preservativos-e-acessorios', 'active' => true),
            array('name' => 'Papel higi??nico e len??os',   'partner_category_id' => $higiene->id, 'slug' => 'papel-higienico-e-lencos',   'active' => true),
            array('name' => 'Cuidados de sa??de',          'partner_category_id' => $higiene->id, 'slug' => 'cuidados-de-saude',          'active' => true),
            array('name' => 'Prote????o COVID',             'partner_category_id' => $higiene->id, 'slug' => 'protecao-covid',             'active' => true),
            
            array('name' => 'Leites infantis',      'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            array('name' => 'Alimenta????o infantil', 'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            array('name' => 'Fraldas e Toalhitas',  'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            array('name' => 'Banho e Higiene',      'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            array('name' => 'Puericultura',         'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            array('name' => 'Roupa do Beb??',        'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            array('name' => 'Brinquedos e livros',  'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            
            array('name' => 'Limpeza da cozinha',             'partner_category_id' => $limpeza->id, 'slug' => 'limpeza-da-cozinha',            'active' => true),
            array('name' => 'Limpeza da roupa',               'partner_category_id' => $limpeza->id, 'slug' => 'limpeza-da-roupa',              'active' => true),
            array('name' => 'Limpeza geral',                  'partner_category_id' => $limpeza->id, 'slug' => 'limpeza-geral',                 'active' => true),
            array('name' => 'Limpeza WC',                     'partner_category_id' => $limpeza->id, 'slug' => 'limpeza-wc',                    'active' => true),
            array('name' => 'Desinfetantes e Prote????o',       'partner_category_id' => $limpeza->id, 'slug' => 'desinfetantes-e-protecao',      'active' => true),
            array('name' => 'Guardanapos, Rolos e Pel??culas', 'partner_category_id' => $limpeza->id, 'slug' => 'guardanapos-rolos-e-peliculas', 'active' => true),
            array('name' => 'Papel higi??nico e len??os',       'partner_category_id' => $limpeza->id, 'slug' => 'papel-higienico-e-lencos',      'active' => true),
            array('name' => 'Ambientadores',                  'partner_category_id' => $limpeza->id, 'slug' => 'ambientadores',                 'active' => true),
            array('name' => 'Inseticidas',                    'partner_category_id' => $limpeza->id, 'slug' => 'inseticidas',                   'active' => true),
            array('name' => 'Limpeza de Cal??ado',             'partner_category_id' => $limpeza->id, 'slug' => 'limpeza-de-calcado',            'active' => true),
            array('name' => 'Produtos ecol??gicos',            'partner_category_id' => $limpeza->id, 'slug' => 'produtos-ecologicos',           'active' => true),
            array('name' => 'Baldes e sacos de lixo',         'partner_category_id' => $limpeza->id, 'slug' => 'baldes-e-sacos-de-lixo',        'active' => true),
            array('name' => 'Panos, baldes e vassouras',      'partner_category_id' => $limpeza->id, 'slug' => 'panos-baldes-e-vassouras',      'active' => true),
            array('name' => 'Aspiradores e lavadouras',       'partner_category_id' => $limpeza->id, 'slug' => 'aspiradores-e-lavadouras',      'active' => true),
            
            array('name' => 'Cozinha',                  'partner_category_id' => $casa->id, 'slug' => 'cozinha',                  'active' => true),
            array('name' => 'Mesa',                     'partner_category_id' => $casa->id, 'slug' => 'mesa',                     'active' => true),
            array('name' => 'Festa',                    'partner_category_id' => $casa->id, 'slug' => 'festa',                    'active' => true),
            array('name' => 'Decora????o',                'partner_category_id' => $casa->id, 'slug' => 'decoracao',                'active' => true),
            array('name' => 'Mobili??rio',               'partner_category_id' => $casa->id, 'slug' => 'mobiliario',               'active' => true),
            array('name' => 'Mobili??rio exterior',      'partner_category_id' => $casa->id, 'slug' => 'mobiliario-exterior',      'active' => true),
            array('name' => 'Colch??es',                 'partner_category_id' => $casa->id, 'slug' => 'colchoes',                 'active' => true),
            array('name' => 'Texteis para quarto',      'partner_category_id' => $casa->id, 'slug' => 'texteis-para-quarto',      'active' => true),
            array('name' => 'Banho e Higiene',          'partner_category_id' => $casa->id, 'slug' => 'banho-e-higiene',          'active' => true),
            array('name' => 'Lavandaria e organiza????o', 'partner_category_id' => $casa->id, 'slug' => 'lavandaria-e-organizacao', 'active' => true),
            array('name' => 'Eletrodom??sticos',         'partner_category_id' => $casa->id, 'slug' => 'eletrodomesticos',         'active' => true),
            array('name' => 'Pilhas, Ilumina????o',       'partner_category_id' => $casa->id, 'slug' => 'pilhas-iluminacao',        'active' => true),
            array('name' => 'Bricolage e autom??vel',    'partner_category_id' => $casa->id, 'slug' => 'bricolage-e-automovel',    'active' => true),
            array('name' => 'Jardim e exterior',        'partner_category_id' => $casa->id, 'slug' => 'jardim-e-exterior',        'active' => true),
            
            array('name' => 'Comida c??o',              'partner_category_id' => $animais->id, 'slug' => 'comida-cao',              'active' => true),
            array('name' => 'Comida gatos',            'partner_category_id' => $animais->id, 'slug' => 'comida-gatos',            'active' => true),
            array('name' => 'periquitos e peixes',     'partner_category_id' => $animais->id, 'slug' => 'periquitos-e-peixes',     'active' => true),
            array('name' => 'Brinquedos e acessorios', 'partner_category_id' => $animais->id, 'slug' => 'brinquedos-e-acessorios', 'active' => true),
            array('name' => 'Higiene',                 'partner_category_id' => $animais->id, 'slug' => 'higiene',                 'active' => true),
            
            array('name' => 'Jogos e Puzzles',                  'partner_category_id' => $brinquedos->id, 'slug' => 'jogos-e-puzzles',                 'active' => true),
            array('name' => 'Bonecas e Peluches',               'partner_category_id' => $brinquedos->id, 'slug' => 'bonecas-e-peluches',              'active' => true),
            array('name' => 'A????o e Super herois',              'partner_category_id' => $brinquedos->id, 'slug' => 'acao-e-super-herois',             'active' => true),
            array('name' => 'Ve??culos e r??dio controlo',        'partner_category_id' => $brinquedos->id, 'slug' => 'veiculos-e-radio-controlo',       'active' => true),
            array('name' => 'Beb?? e Pre-escolar',               'partner_category_id' => $brinquedos->id, 'slug' => 'bebe-e-pre-escolar',              'active' => true),
            array('name' => 'Faz de Conta',                     'partner_category_id' => $brinquedos->id, 'slug' => 'faz-de-conta',                    'active' => true),
            array('name' => 'Did??ticos, Pintura e Plasticinas', 'partner_category_id' => $brinquedos->id, 'slug' => 'didaticos-pintura-e-plasticinas', 'active' => true),
            array('name' => 'Cient??ficos e Educativos',         'partner_category_id' => $brinquedos->id, 'slug' => 'cientificos-e-educativos',        'active' => true),
            array('name' => 'Livros Infantis e Juvenis',        'partner_category_id' => $brinquedos->id, 'slug' => 'livros-infantis-e-juvenis',       'active' => true),
            array('name' => 'Consolas e jogos',                 'partner_category_id' => $brinquedos->id, 'slug' => 'consolas-e-jogos',                'active' => true),
            array('name' => 'Kidult',                           'partner_category_id' => $brinquedos->id, 'slug' => 'kidult',                          'active' => true),
            array('name' => 'Ar Livre',                         'partner_category_id' => $brinquedos->id, 'slug' => 'ar-livre',                        'active' => true),
            
            array('name' => 'Bicicletas, trotinetes e patins', 'partner_category_id' => $desporto->id, 'slug' => 'bicicletas-trotinetes-e-patins', 'active' => true),
            array('name' => 'Mobilidade el??trica',             'partner_category_id' => $desporto->id, 'slug' => 'mobilidade-eletrica',            'active' => true),
            array('name' => 'Mobilidade desportivas',          'partner_category_id' => $desporto->id, 'slug' => 'mobilidade-desportivas',         'active' => true),
            array('name' => 'Roupa de desporto',               'partner_category_id' => $desporto->id, 'slug' => 'roupa-de-desporto',              'active' => true),
            array('name' => 'Campismo',                        'partner_category_id' => $desporto->id, 'slug' => 'campismo',                       'active' => true),
            
            array('name' => 'Beb?? (at?? 36 meses)',             'partner_category_id' => $roupa->id, 'slug' => 'bebe',                          'active' => true),
            array('name' => 'Crian??a (2-14 anos)',             'partner_category_id' => $roupa->id, 'slug' => 'crianca',                       'active' => true),
            array('name' => 'Mulher',                          'partner_category_id' => $roupa->id, 'slug' => 'mulher',                        'active' => true),
            array('name' => 'Homem',                           'partner_category_id' => $roupa->id, 'slug' => 'homem',                         'active' => true),
            array('name' => 'Cal??ado, meias e acessorios',     'partner_category_id' => $roupa->id, 'slug' => 'calcado-meias-e-acessorios',    'active' => true),
            array('name' => 'Roupa de desporto',               'partner_category_id' => $roupa->id, 'slug' => 'roupa-de-desporto',             'active' => true),
            array('name' => 'Fatos banho, chinelos e toalhas', 'partner_category_id' => $roupa->id, 'slug' => 'fatos-banho-chinelos-e-toalha', 'active' => true),
            array('name' => 'Malas e acessorios viagem',       'partner_category_id' => $roupa->id, 'slug' => 'malas-e-acessorios-viagem',     'active' => true),
            
            array('name' => 'Manuais escolares',         'partner_category_id' => $livraria->id, 'slug' => 'manuais-escolares',       'active' => true),
            array('name' => 'Regresso as aulas',         'partner_category_id' => $livraria->id, 'slug' => 'regresso-as-aulas',       'active' => true),
            array('name' => 'Livros',                    'partner_category_id' => $livraria->id, 'slug' => 'livros',                  'active' => true),
            array('name' => 'Papelaria',                 'partner_category_id' => $livraria->id, 'slug' => 'papelaria',               'active' => true),
            array('name' => 'Experiencias Odisseias',    'partner_category_id' => $livraria->id, 'slug' => 'experiencias-odisseias',  'active' => true),
            array('name' => 'Revistas, jornais, cromos', 'partner_category_id' => $livraria->id, 'slug' => 'revistas-jornais-cromos', 'active' => true),
            
            array('name' => 'Dor, Febre e Inflama????o',                           'partner_category_id' => $farmacia->id, 'slug' => 'dor-febre-e-inflamacao',                           'active' => true),
            array('name' => 'Altera????o de sono e humor',                         'partner_category_id' => $farmacia->id, 'slug' => 'alteracao-de-sono-e-humor',                        'active' => true),
            array('name' => 'Tosse, Rouquid??o e dor de garganta',                'partner_category_id' => $farmacia->id, 'slug' => 'tosse-rouquidao-e-dor-de-garganta',                'active' => true),
            array('name' => 'Dermatologia',                                      'partner_category_id' => $farmacia->id, 'slug' => 'dermatologia',                                     'active' => true),
            array('name' => 'Homeopatia',                                        'partner_category_id' => $farmacia->id, 'slug' => 'homeopatia',                                       'active' => true),
            array('name' => 'Cuidado de Olhos e Ouvidos',                        'partner_category_id' => $farmacia->id, 'slug' => 'cuidado-de-olhos-e-ouvidos',                       'active' => true),
            array('name' => 'Infe????es cut??neas',                                 'partner_category_id' => $farmacia->id, 'slug' => 'infecoes-cutaneas',                                'active' => true),
            array('name' => 'Pernas pesadas',                                    'partner_category_id' => $farmacia->id, 'slug' => 'pernas-pesadas',                                   'active' => true),
            array('name' => 'Multivitaminicos, minerais e energizantes',         'partner_category_id' => $farmacia->id, 'slug' => 'multivitaminicos-minerais-e-energizantes',         'active' => true),
            array('name' => 'Bem-estar feminino',                                'partner_category_id' => $farmacia->id, 'slug' => 'bem-estar-feminino',                               'active' => true),
            array('name' => 'Fadiga fisica e intelectual',                       'partner_category_id' => $farmacia->id, 'slug' => 'fadiga-fisica-e-intelectual',                      'active' => true),
            array('name' => 'Saude oral',                                        'partner_category_id' => $farmacia->id, 'slug' => 'saude-oral',                                       'active' => true),
            array('name' => 'Gripes, Constipa????es e Alergias',                   'partner_category_id' => $farmacia->id, 'slug' => 'gripes-constipacoes-e-alergias',                   'active' => true),
            array('name' => 'Ossos e articula????es',                              'partner_category_id' => $farmacia->id, 'slug' => 'ossos-e-articula????es',                             'active' => true),
            array('name' => 'Sistema digestivo',                                 'partner_category_id' => $farmacia->id, 'slug' => 'sistema-digestivo',                                'active' => true),
            array('name' => 'Mam??, Beb?? e Crian??a',                              'partner_category_id' => $farmacia->id, 'slug' => 'mama-bebe-e-crian??a',                              'active' => true),
            array('name' => 'Enjoos, ma disposi????o e Azias',                     'partner_category_id' => $farmacia->id, 'slug' => 'enjoos-ma-disposicao-e-azias',                     'active' => true),
            array('name' => 'Desparazitantes',                                   'partner_category_id' => $farmacia->id, 'slug' => 'desparazitantes',                                  'active' => true),
            array('name' => 'Higiene e Cuidados da Pele',                        'partner_category_id' => $farmacia->id, 'slug' => 'higiene-e-cuidados-da-pele',                       'active' => true),
            array('name' => 'Diarreias, Colicas e Obstipa??oes',                  'partner_category_id' => $farmacia->id, 'slug' => 'diarreias-colicas-e-obstipacoes',                  'active' => true),
            array('name' => 'Descongestionantes',                                'partner_category_id' => $farmacia->id, 'slug' => 'descongestionantes',                               'active' => true),
            array('name' => 'Preservativos, Testes de gravidez e lubrificantes', 'partner_category_id' => $farmacia->id, 'slug' => 'preservativos-testes-de-gravidez-e-lubrificantes', 'active' => true),
            
        );
        
        ProductCategory::insert($data);
    }
}

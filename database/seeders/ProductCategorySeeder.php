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
        $mercearia   = PartnerCategory::where('slug', 'mercearia')->first();
        $bio         = PartnerCategory::where('slug', 'bio-e-intolerancias')->first();
        $laticinios  = PartnerCategory::where('slug', 'laticinios-e-ovos')->first();
        $peixaria    = PartnerCategory::where('slug', 'peixaria-e-talho')->first();
        $frutas      = PartnerCategory::where('slug', 'frutas-e-legumes')->first();
        $charcutaria = PartnerCategory::where('slug', 'charcutaria-e-queijos')->first();
        $padaria     = PartnerCategory::where('slug', 'padaria-e-pastelaria')->first();
        $congelados  = PartnerCategory::where('slug', 'congelados')->first();
        $bebidas     = PartnerCategory::where('slug', 'bebidas-e-garrafeira')->first();
        $higiene     = PartnerCategory::where('slug', 'higiene-e-beleza')->first();
        $bebe        = PartnerCategory::where('slug', 'bebe')->first();
        $limpeza     = PartnerCategory::where('slug', 'limpeza')->first();
        $casa        = PartnerCategory::where('slug', 'casa-bricolage-e-jardim')->first();
        $animais     = PartnerCategory::where('slug', 'animais')->first();
        $brinquedos  = PartnerCategory::where('slug', 'brinquedos-e-jogos')->first();
        $desporto    = PartnerCategory::where('slug', 'desporto-e-ar-livre')->first();
        $roupa       = PartnerCategory::where('slug', 'roupa-calcado-bagagens')->first();
        $livraria    = PartnerCategory::where('slug', 'livraria-e-papelaria')->first();

        $data = array(

            // array('name' => 'Arroz, Massas e Farinhas',         'partner_category_id' => $mercearia->id, 'slug' => 'arroz-massas-e-farinhas',         'active' => true),
            // array('name' => 'Azeite, Óleo e Vinagre',           'partner_category_id' => $mercearia->id, 'slug' => 'azeite-oleo-e-vinagre',           'active' => true),
            // array('name' => 'Batata Frita e Snacks',            'partner_category_id' => $mercearia->id, 'slug' => 'batata-frita-e-snacks',           'active' => true),
            // array('name' => 'Conservas e Salsicha',             'partner_category_id' => $mercearia->id, 'slug' => 'conservas-e-salsicha',            'active' => true),
            // array('name' => 'Molhos, Temperos e Sal',           'partner_category_id' => $mercearia->id, 'slug' => 'molhos-tempero-e-sal',            'active' => true),
            // array('name' => 'Sopas',                            'partner_category_id' => $mercearia->id, 'slug' => 'sopas',                           'active' => true),
            // array('name' => 'Tomate, Feijão e Grão',            'partner_category_id' => $mercearia->id, 'slug' => 'tomate-feijao-e-grao',            'active' => true),
            // array('name' => 'Alimentação infantil',             'partner_category_id' => $mercearia->id, 'slug' => 'alimentacao-infantil',            'active' => true),
            // array('name' => 'Açucar, Doces e Mel',              'partner_category_id' => $mercearia->id, 'slug' => 'acucar-doces-e-mel',              'active' => true),
            // array('name' => 'Barras e Cereais',                 'partner_category_id' => $mercearia->id, 'slug' => 'barras-e-cereais',                'active' => true),
            // array('name' => 'Bolachas, Bolos e Tostas',         'partner_category_id' => $mercearia->id, 'slug' => 'bolachas-bolos-e-tostas',         'active' => true),
            // array('name' => 'Doçaria, Chocolates e Sobremesas', 'partner_category_id' => $mercearia->id, 'slug' => 'docaria-chocolates-e-sobremesas', 'active' => true),
            
            // array('name' => 'Biológicos',                  'partner_category_id' => $bio->id, 'slug' => 'biologicos',                  'active' => true),
            // array('name' => 'Sem Lactose',                 'partner_category_id' => $bio->id, 'slug' => 'sem-lactose',                 'active' => true),
            // array('name' => 'Sem Glúten',                  'partner_category_id' => $bio->id, 'slug' => 'sem-gluten',                  'active' => true),
            // array('name' => 'Vegano e Vegetariano',        'partner_category_id' => $bio->id, 'slug' => 'vegano-e-vegetariano',        'active' => true),
            // array('name' => 'Barras e Cereais',            'partner_category_id' => $bio->id, 'slug' => 'barras-e-cereais',            'active' => true),
            // array('name' => 'Nutrição desportiva',         'partner_category_id' => $bio->id, 'slug' => 'nutricao-esportiva',          'active' => true),
            // array('name' => 'Suplementos alimentares',     'partner_category_id' => $bio->id, 'slug' => 'suplementos-alimentares',     'active' => true),
            // array('name' => 'Bebidas',                     'partner_category_id' => $bio->id, 'slug' => 'bebidas',                     'active' => true),
            // array('name' => 'Frutas e Legumes biologicos', 'partner_category_id' => $bio->id, 'slug' => 'frutas-e-legumes-biologicos', 'active' => true),
            // array('name' => 'Chás, Infusões e cafés',      'partner_category_id' => $bio->id, 'slug' => 'chas-infusoes-e-cafes',       'active' => true),
            
            // array('name' => 'Leite',                       'partner_category_id' => $laticinios->id, 'slug' => 'leite',                       'active' => true),
            // array('name' => 'Iogurtes',                    'partner_category_id' => $laticinios->id, 'slug' => 'iogurtes',                    'active' => true),
            // array('name' => 'Gelatinas e sobremesas',      'partner_category_id' => $laticinios->id, 'slug' => 'gelatinas-e-sobremesas',      'active' => true),
            // array('name' => 'Manteigas e Cremes vegetais', 'partner_category_id' => $laticinios->id, 'slug' => 'manteigas-e-cremes-vegetais', 'active' => true),
            // array('name' => 'Natas e Bechamel',            'partner_category_id' => $laticinios->id, 'slug' => 'natas-e-bechamel',            'active' => true),
            // array('name' => 'Ovos',                        'partner_category_id' => $laticinios->id, 'slug' => 'ovos',                        'active' => true),
            // array('name' => 'Bebidas vegetais',            'partner_category_id' => $laticinios->id, 'slug' => 'bebidas-vegetais',            'active' => true),
            // array('name' => 'Queijos',                     'partner_category_id' => $laticinios->id, 'slug' => 'queijos',                     'active' => true),
           
            // array('name' => 'Peixe fresco',                   'partner_category_id' => $peixaria->id, 'slug' => 'peixe-fresco',                   'active' => true),
            // array('name' => 'Peixe congelado',                'partner_category_id' => $peixaria->id, 'slug' => 'peixe-congelado',                'active' => true),
            // array('name' => 'Bacalhau',                       'partner_category_id' => $peixaria->id, 'slug' => 'bacalhau',                       'active' => true),
            // array('name' => 'Marisco',                        'partner_category_id' => $peixaria->id, 'slug' => 'marisco',                        'active' => true),
            // array('name' => 'Polvo, Lulas e Chocos',          'partner_category_id' => $peixaria->id, 'slug' => 'polvo-lulas-e-chocos',           'active' => true),
            // array('name' => 'Salmão Fumado e Especialidades', 'partner_category_id' => $peixaria->id, 'slug' => 'salmao-fumado-e-especialidades', 'active' => true),
            // array('name' => 'Frango',                         'partner_category_id' => $peixaria->id, 'slug' => 'frango',                         'active' => true),
            // array('name' => 'Novilho, Vitela e Vitelão',      'partner_category_id' => $peixaria->id, 'slug' => 'novilho-vitela-e-vitelao',       'active' => true),
            // array('name' => 'Porco',                          'partner_category_id' => $peixaria->id, 'slug' => 'porco',                          'active' => true),
            // array('name' => 'Perú, Pato e Coelho',            'partner_category_id' => $peixaria->id, 'slug' => 'peru-pato-e-coelho',             'active' => true),
            // array('name' => 'Borrego e Cabrito',              'partner_category_id' => $peixaria->id, 'slug' => 'borrego-e-cabrito',              'active' => true),
            // array('name' => 'Picados e Especialidades',       'partner_category_id' => $peixaria->id, 'slug' => 'picados-e-especialidades',       'active' => true),
            
            // array('name' => 'Frutas',                      'partner_category_id' => $frutas->id, 'slug' => 'frutas',                      'active' => true),
            // array('name' => 'Legumes',                     'partner_category_id' => $frutas->id, 'slug' => 'legumes',                     'active' => true),
            // array('name' => 'Frutas e Legumes biologicos', 'partner_category_id' => $frutas->id, 'slug' => 'frutas-e-legumes-biologicos', 'active' => true),
            // array('name' => 'Frutos secos',                'partner_category_id' => $frutas->id, 'slug' => 'frutos-secos',                'active' => true),
            // array('name' => 'Tremoços e azeitonas',        'partner_category_id' => $frutas->id, 'slug' => 'tremocos-e-azeitonas',        'active' => true),
            
            // array('name' => 'Mortadela, salame e paio',   'partner_category_id' => $charcutaria->id, 'slug' => 'mortadela-salame-e-paio',    'active' => true),
            // array('name' => 'Enchidos',                   'partner_category_id' => $charcutaria->id, 'slug' => 'enchidos',                   'active' => true),
            // array('name' => 'Fiambre',                    'partner_category_id' => $charcutaria->id, 'slug' => 'fiambre',                    'active' => true),
            // array('name' => 'Presunto e bacon',           'partner_category_id' => $charcutaria->id, 'slug' => 'presunto-e-bacon',           'active' => true),
            // array('name' => 'Salsichas',                  'partner_category_id' => $charcutaria->id, 'slug' => 'salsichas',                  'active' => true),
            // array('name' => 'Queijo barrar e fundido',    'partner_category_id' => $charcutaria->id, 'slug' => 'queijo-barrar-e-fundido',    'active' => true),
            // array('name' => 'Queijo bola e fatiado',      'partner_category_id' => $charcutaria->id, 'slug' => 'queijo-bola-e-fatiado',      'active' => true),
            // array('name' => 'Queijo regional e corrente', 'partner_category_id' => $charcutaria->id, 'slug' => 'queijo-regional-e-corrente', 'active' => true),
            // array('name' => 'Queijos gourmet',            'partner_category_id' => $charcutaria->id, 'slug' => 'queijos-gourmet',            'active' => true),
            // array('name' => 'Queijo fresco e requeijão',  'partner_category_id' => $charcutaria->id, 'slug' => 'queijo-fresco-e-requeijao',  'active' => true),
            // array('name' => 'Queijo light e sem lactose', 'partner_category_id' => $charcutaria->id, 'slug' => 'queijo-light-e-sem-lactose', 'active' => true),
            // array('name' => 'snacks de queijo',           'partner_category_id' => $charcutaria->id, 'slug' => 'snacks-de-queijo',           'active' => true),
            
            // array('name' => 'Pão fresco e broa',                'partner_category_id' => $padaria->id, 'slug' => 'pao-fresco-e-broa',               'active' => true),
            // array('name' => 'Pão de forma',                     'partner_category_id' => $padaria->id, 'slug' => 'pao-de-forma',                    'active' => true),
            // array('name' => 'Pão cachorro, hamburgers e wraps', 'partner_category_id' => $padaria->id, 'slug' => 'pao-cachorro-hamburgers-e-wraps', 'active' => true),
            // array('name' => 'Tostas e Croissants',              'partner_category_id' => $padaria->id, 'slug' => 'tostas-e-croissants',             'active' => true),
            // array('name' => 'Bolos',                            'partner_category_id' => $padaria->id, 'slug' => 'bolos',                           'active' => true),
            // array('name' => 'Biscoitos e Bolachas',             'partner_category_id' => $padaria->id, 'slug' => 'biscoitos-e-bolachas',            'active' => true),
            // array('name' => 'Pastelaria variada',               'partner_category_id' => $padaria->id, 'slug' => 'pastelaria-variada',              'active' => true),
            
            // array('name' => 'Douradinhos e Nuggets',     'partner_category_id' => $congelados->id, 'slug' => 'douradinhos-e-nuggets',     'active' => true),
            // array('name' => 'Pizzas',                    'partner_category_id' => $congelados->id, 'slug' => 'pizzas',                    'active' => true),
            // array('name' => 'Hamburgers e Refeições',    'partner_category_id' => $congelados->id, 'slug' => 'hamburgers-e-refeições',    'active' => true),
            // array('name' => 'Salgados e aperetivos',     'partner_category_id' => $congelados->id, 'slug' => 'salgados-e-aperetivos',     'active' => true),
            // array('name' => 'Vegetais e frutas',         'partner_category_id' => $congelados->id, 'slug' => 'vegetais-e-frutas',         'active' => true),
            // array('name' => 'Carne Congelada',           'partner_category_id' => $congelados->id, 'slug' => 'carne-congelada',           'active' => true),
            // array('name' => 'Peixe e Marisco congelado', 'partner_category_id' => $congelados->id, 'slug' => 'peixe-e-marisco-congelado', 'active' => true),
            // array('name' => 'Gelados e Sobremesas',      'partner_category_id' => $congelados->id, 'slug' => 'gelados-e-sobremesas',      'active' => true),
            
            // array('name' => 'Água',                     'partner_category_id' => $bebidas->id, 'slug' => 'agua',                     'active' => true),
            // array('name' => 'Refrigerante',             'partner_category_id' => $bebidas->id, 'slug' => 'refrigerante',             'active' => true),
            // array('name' => 'Sumos e Nectares',         'partner_category_id' => $bebidas->id, 'slug' => 'sumos-e-nectares',         'active' => true),
            // array('name' => 'Cervejas e Sidras',        'partner_category_id' => $bebidas->id, 'slug' => 'cervejas-e-sidras',        'active' => true),
            // array('name' => 'Vinho',                    'partner_category_id' => $bebidas->id, 'slug' => 'vinho',                    'active' => true),
            // array('name' => 'Cabazes de Vinho',         'partner_category_id' => $bebidas->id, 'slug' => 'cabazes-de-vinho',         'active' => true),
            // array('name' => 'Vinho do Porto',           'partner_category_id' => $bebidas->id, 'slug' => 'vinho-do-porto',           'active' => true),
            // array('name' => 'Vinho Moscatel e Madeira', 'partner_category_id' => $bebidas->id, 'slug' => 'vinho-moscatel-e-madeira', 'active' => true),
            // array('name' => 'Whisky',                   'partner_category_id' => $bebidas->id, 'slug' => 'whisky',                   'active' => true),
            // array('name' => 'Gin e Vodka',              'partner_category_id' => $bebidas->id, 'slug' => 'gin-e-vodka',              'active' => true),
            // array('name' => 'Rum e Tequila',            'partner_category_id' => $bebidas->id, 'slug' => 'rum-e-tequila',            'active' => true),
            // array('name' => 'Cachaça e Aguardente',     'partner_category_id' => $bebidas->id, 'slug' => 'cachaca-e-aguardente',     'active' => true),
            // array('name' => 'Licores e Aperetivos',     'partner_category_id' => $bebidas->id, 'slug' => 'licores-e-aperitivos',     'active' => true),
            // array('name' => 'Champagne e Espumante',    'partner_category_id' => $bebidas->id, 'slug' => 'champagne-e-espumante',    'active' => true),
            // array('name' => 'Acessórios de garrafeira', 'partner_category_id' => $bebidas->id, 'slug' => 'acessorios-de-garrafeira', 'active' => true),
            
            // array('name' => 'Cabelo',                     'partner_category_id' => $higiene->id, 'slug' => 'cabelo',                     'active' => true),
            // array('name' => 'Corpo',                      'partner_category_id' => $higiene->id, 'slug' => 'corpo',                      'active' => true),
            // array('name' => 'Rosto',                      'partner_category_id' => $higiene->id, 'slug' => 'rosto',                      'active' => true),
            // array('name' => 'Higiene Oral',               'partner_category_id' => $higiene->id, 'slug' => 'higiene-oral',               'active' => true),
            // array('name' => 'Solares e Bronzeadores',     'partner_category_id' => $higiene->id, 'slug' => 'solares-e-bronzeadores',     'active' => true),
            // array('name' => 'Produtos para homem',        'partner_category_id' => $higiene->id, 'slug' => 'produtos-para-homem',        'active' => true),
            // array('name' => 'Maquilhagem e vernizes',     'partner_category_id' => $higiene->id, 'slug' => 'maquilhagem-e-vernizes',     'active' => true),
            // array('name' => 'perfumes e conjuntos',       'partner_category_id' => $higiene->id, 'slug' => 'perfumes-e-conjuntos',       'active' => true),
            // array('name' => 'Higiene Íntima',             'partner_category_id' => $higiene->id, 'slug' => 'higiene-intima',             'active' => true),
            // array('name' => 'Incontinência',              'partner_category_id' => $higiene->id, 'slug' => 'incontinencia',              'active' => true),
            // array('name' => 'Preservativos e acessorios', 'partner_category_id' => $higiene->id, 'slug' => 'preservativos-e-acessorios', 'active' => true),
            // array('name' => 'Papel higiénico e lenços',   'partner_category_id' => $higiene->id, 'slug' => 'papel-higienico-e-lencos',   'active' => true),
            // array('name' => 'Cuidados de saúde',          'partner_category_id' => $higiene->id, 'slug' => 'cuidados-de-saude',          'active' => true),
            // array('name' => 'Proteção COVID',             'partner_category_id' => $higiene->id, 'slug' => 'protecao-covid',             'active' => true),
            
            // array('name' => 'Leites infantis',      'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            // array('name' => 'Alimentação infantil', 'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            // array('name' => 'Fraldas e Toalhitas',  'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            // array('name' => 'Banho e Higiene',      'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            // array('name' => 'Puericultura',         'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            // array('name' => 'Roupa do Bebé',        'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            // array('name' => 'Brinquedos e livros',  'partner_category_id' => $bebe->id, 'slug' => 'entradas',          'active' => true),
            
            // array('name' => 'Limpeza da cozinha',             'partner_category_id' => $limpeza->id, 'slug' => 'limpeza-da-cozinha',            'active' => true),
            // array('name' => 'Limpeza da roupa',               'partner_category_id' => $limpeza->id, 'slug' => 'limpeza-da-roupa',              'active' => true),
            // array('name' => 'Limpeza geral',                  'partner_category_id' => $limpeza->id, 'slug' => 'limpeza-geral',                 'active' => true),
            // array('name' => 'Limpeza WC',                     'partner_category_id' => $limpeza->id, 'slug' => 'limpeza-wc',                    'active' => true),
            // array('name' => 'Desinfetantes e Proteção',       'partner_category_id' => $limpeza->id, 'slug' => 'desinfetantes-e-protecao',      'active' => true),
            // array('name' => 'Guardanapos, Rolos e Películas', 'partner_category_id' => $limpeza->id, 'slug' => 'guardanapos-rolos-e-peliculas', 'active' => true),
            // array('name' => 'Papel higiénico e lenços',       'partner_category_id' => $limpeza->id, 'slug' => 'papel-higienico-e-lencos',      'active' => true),
            // array('name' => 'Ambientadores',                  'partner_category_id' => $limpeza->id, 'slug' => 'ambientadores',                 'active' => true),
            // array('name' => 'Inseticidas',                    'partner_category_id' => $limpeza->id, 'slug' => 'inseticidas',                   'active' => true),
            // array('name' => 'Limpeza de Calçado',             'partner_category_id' => $limpeza->id, 'slug' => 'limpeza-de-calcado',            'active' => true),
            // array('name' => 'Produtos ecológicos',            'partner_category_id' => $limpeza->id, 'slug' => 'produtos-ecologicos',           'active' => true),
            // array('name' => 'Baldes e sacos de lixo',         'partner_category_id' => $limpeza->id, 'slug' => 'baldes-e-sacos-de-lixo',        'active' => true),
            // array('name' => 'Panos, baldes e vassouras',      'partner_category_id' => $limpeza->id, 'slug' => 'panos-baldes-e-vassouras',      'active' => true),
            // array('name' => 'Aspiradores e lavadouras',       'partner_category_id' => $limpeza->id, 'slug' => 'aspiradores-e-lavadouras',      'active' => true),
            
            // array('name' => 'Cozinha',                  'partner_category_id' => $casa->id, 'slug' => 'cozinha',                  'active' => true),
            // array('name' => 'Mesa',                     'partner_category_id' => $casa->id, 'slug' => 'mesa',                     'active' => true),
            // array('name' => 'Festa',                    'partner_category_id' => $casa->id, 'slug' => 'festa',                    'active' => true),
            // array('name' => 'Decoração',                'partner_category_id' => $casa->id, 'slug' => 'decoracao',                'active' => true),
            // array('name' => 'Mobiliário',               'partner_category_id' => $casa->id, 'slug' => 'mobiliario',               'active' => true),
            // array('name' => 'Mobiliário exterior',      'partner_category_id' => $casa->id, 'slug' => 'mobiliario-exterior',      'active' => true),
            // array('name' => 'Colchões',                 'partner_category_id' => $casa->id, 'slug' => 'colchoes',                 'active' => true),
            // array('name' => 'Texteis para quarto',      'partner_category_id' => $casa->id, 'slug' => 'texteis-para-quarto',      'active' => true),
            // array('name' => 'Banho e Higiene',          'partner_category_id' => $casa->id, 'slug' => 'banho-e-higiene',          'active' => true),
            // array('name' => 'Lavandaria e organização', 'partner_category_id' => $casa->id, 'slug' => 'lavandaria-e-organizacao', 'active' => true),
            // array('name' => 'Eletrodomésticos',         'partner_category_id' => $casa->id, 'slug' => 'eletrodomesticos',         'active' => true),
            // array('name' => 'Pilhas, Iluminação',       'partner_category_id' => $casa->id, 'slug' => 'pilhas-iluminacao',        'active' => true),
            // array('name' => 'Bricolage e automóvel',    'partner_category_id' => $casa->id, 'slug' => 'bricolage-e-automovel',    'active' => true),
            // array('name' => 'Jardim e exterior',        'partner_category_id' => $casa->id, 'slug' => 'jardim-e-exterior',        'active' => true),
            
            // array('name' => 'Comida cão',              'partner_category_id' => $animais->id, 'slug' => 'comida-cao',              'active' => true),
            // array('name' => 'Comida gatos',            'partner_category_id' => $animais->id, 'slug' => 'comida-gatos',            'active' => true),
            // array('name' => 'periquitos e peixes',     'partner_category_id' => $animais->id, 'slug' => 'periquitos-e-peixes',     'active' => true),
            // array('name' => 'Brinquedos e acessorios', 'partner_category_id' => $animais->id, 'slug' => 'brinquedos-e-acessorios', 'active' => true),
            // array('name' => 'Higiene',                 'partner_category_id' => $animais->id, 'slug' => 'higiene',                 'active' => true),
            
            // array('name' => 'Jogos e Puzzles',                  'partner_category_id' => $brinquedos->id, 'slug' => 'jogos-e-puzzles',                 'active' => true),
            // array('name' => 'Bonecas e Peluches',               'partner_category_id' => $brinquedos->id, 'slug' => 'bonecas-e-peluches',              'active' => true),
            // array('name' => 'Ação e Super herois',              'partner_category_id' => $brinquedos->id, 'slug' => 'acao-e-super-herois',             'active' => true),
            // array('name' => 'Veículos e rádio controlo',        'partner_category_id' => $brinquedos->id, 'slug' => 'veiculos-e-radio-controlo',       'active' => true),
            // array('name' => 'Bebé e Pre-escolar',               'partner_category_id' => $brinquedos->id, 'slug' => 'bebe-e-pre-escolar',              'active' => true),
            // array('name' => 'Faz de Conta',                     'partner_category_id' => $brinquedos->id, 'slug' => 'faz-de-conta',                    'active' => true),
            // array('name' => 'Didáticos, Pintura e Plasticinas', 'partner_category_id' => $brinquedos->id, 'slug' => 'didaticos-pintura-e-plasticinas', 'active' => true),
            // array('name' => 'Científicos e Educativos',         'partner_category_id' => $brinquedos->id, 'slug' => 'cientificos-e-educativos',        'active' => true),
            // array('name' => 'Livros Infantis e Juvenis',        'partner_category_id' => $brinquedos->id, 'slug' => 'livros-infantis-e-juvenis',       'active' => true),
            // array('name' => 'Consolas e jogos',                 'partner_category_id' => $brinquedos->id, 'slug' => 'consolas-e-jogos',                'active' => true),
            // array('name' => 'Kidult',                           'partner_category_id' => $brinquedos->id, 'slug' => 'kidult',                          'active' => true),
            // array('name' => 'Ar Livre',                         'partner_category_id' => $brinquedos->id, 'slug' => 'ar-livre',                        'active' => true),
            
            // array('name' => 'Bicicletas, trotinetes e patins', 'partner_category_id' => $desporto->id, 'slug' => 'bicicletas-trotinetes-e-patins', 'active' => true),
            // array('name' => 'Mobilidade elétrica',             'partner_category_id' => $desporto->id, 'slug' => 'mobilidade-eletrica',            'active' => true),
            // array('name' => 'Mobilidade desportivas',          'partner_category_id' => $desporto->id, 'slug' => 'mobilidade-desportivas',         'active' => true),
            // array('name' => 'Roupa de desporto',               'partner_category_id' => $desporto->id, 'slug' => 'roupa-de-desporto',              'active' => true),
            // array('name' => 'Campismo',                        'partner_category_id' => $desporto->id, 'slug' => 'campismo',                       'active' => true),
            
            // array('name' => 'Bebé (até 36 meses)',             'partner_category_id' => $roupa->id, 'slug' => 'bebe',                          'active' => true),
            // array('name' => 'Criança (2-14 anos)',             'partner_category_id' => $roupa->id, 'slug' => 'crianca',                       'active' => true),
            // array('name' => 'Mulher',                          'partner_category_id' => $roupa->id, 'slug' => 'mulher',                        'active' => true),
            // array('name' => 'Homem',                           'partner_category_id' => $roupa->id, 'slug' => 'homem',                         'active' => true),
            // array('name' => 'Calçado, meias e acessorios',     'partner_category_id' => $roupa->id, 'slug' => 'calcado-meias-e-acessorios',    'active' => true),
            // array('name' => 'Roupa de desporto',               'partner_category_id' => $roupa->id, 'slug' => 'roupa-de-desporto',             'active' => true),
            // array('name' => 'Fatos banho, chinelos e toalhas', 'partner_category_id' => $roupa->id, 'slug' => 'fatos-banho-chinelos-e-toalha', 'active' => true),
            // array('name' => 'Malas e acessorios viagem',       'partner_category_id' => $roupa->id, 'slug' => 'malas-e-acessorios-viagem',     'active' => true),
            
            // array('name' => 'Manuais escolares',          'partner_category_id' => $restaurante->id, 'slug' => 'entradas',          'active' => true),
            // array('name' => 'Regresso as aulas',          'partner_category_id' => $restaurante->id, 'slug' => 'entradas',          'active' => true),
            // array('name' => 'Livros',          'partner_category_id' => $restaurante->id, 'slug' => 'entradas',          'active' => true),
            // array('name' => 'Papelaria',          'partner_category_id' => $restaurante->id, 'slug' => 'entradas',          'active' => true),
            // array('name' => 'Experiencias Odisseias',          'partner_category_id' => $restaurante->id, 'slug' => 'entradas',          'active' => true),
            // array('name' => 'Revistas, jornais, cromos',          'partner_category_id' => $restaurante->id, 'slug' => 'entradas',          'active' => true),
            


        );
        
        ProductCategory::insert($data);
    }
}

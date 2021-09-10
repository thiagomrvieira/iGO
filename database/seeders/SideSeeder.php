<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Side;
use App\Models\PartnerCategory;

class SideSeeder extends Seeder
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
            array('name' => 'arroz branco',                          'category_id'=> $partnerCategory->id, 'slug' => 'arroz-branco',                          'active' => true), 
            array('name' => 'arroz de cenoura',                      'category_id'=> $partnerCategory->id, 'slug' => 'arroz-de-cenoura',                      'active' => true), 
            array('name' => 'arroz de tomate',                       'category_id'=> $partnerCategory->id, 'slug' => 'arroz-de-tomate',                       'active' => true), 
            array('name' => 'arroz com passas',                      'category_id'=> $partnerCategory->id, 'slug' => 'arroz-com-passas',                      'active' => true), 
            array('name' => 'arroz de feijão',                       'category_id'=> $partnerCategory->id, 'slug' => 'arroz-de-feijao',                       'active' => true), 
            array('name' => 'legumes salteados',                     'category_id'=> $partnerCategory->id, 'slug' => 'legumes-salteados',                     'active' => true), 
            array('name' => 'legumes grelhados',                     'category_id'=> $partnerCategory->id, 'slug' => 'legumes-grelhados',                     'active' => true), 
            array('name' => 'risottto',                              'category_id'=> $partnerCategory->id, 'slug' => 'risotto',                               'active' => true), 
            array('name' => 'salada primavera',                      'category_id'=> $partnerCategory->id, 'slug' => 'salada-primavera',                      'active' => true), 
            array('name' => 'salada de tomate',                      'category_id'=> $partnerCategory->id, 'slug' => 'salada-de-tomate',                      'active' => true), 
            array('name' => 'salada verde',                          'category_id'=> $partnerCategory->id, 'slug' => 'salada-verde',                          'active' => true), 
            array('name' => 'salada primavera com queijo',           'category_id'=> $partnerCategory->id, 'slug' => 'salada-primavera-com-queijo',           'active' => true), 
            array('name' => 'massa espargete branca',                'category_id'=> $partnerCategory->id, 'slug' => 'massa-espargete-branca',                'active' => true), 
            array('name' => 'massa espargete salteada com vegetais', 'category_id'=> $partnerCategory->id, 'slug' => 'massa-espargete-salteada-com-vegetais', 'active' => true), 
            array('name' => 'batata rena cozida',                    'category_id'=> $partnerCategory->id, 'slug' => 'batata-rena-cozida',                    'active' => true), 
            array('name' => 'batata rena frita',                     'category_id'=> $partnerCategory->id, 'slug' => 'batata-rena-frita',                     'active' => true), 
            array('name' => 'batata doce cozida',                    'category_id'=> $partnerCategory->id, 'slug' => 'batata-doce-cozida',                    'active' => true), 
            array('name' => 'batata doce frita',                     'category_id'=> $partnerCategory->id, 'slug' => 'batata-doce-frita',                     'active' => true), 
            array('name' => 'banana pão cozida',                     'category_id'=> $partnerCategory->id, 'slug' => 'banana-pao-cozida',                     'active' => true), 
            array('name' => 'banana pão frita',                      'category_id'=> $partnerCategory->id, 'slug' => 'banana-pao-frita',                      'active' => true), 
            array('name' => 'banana pão assada',                     'category_id'=> $partnerCategory->id, 'slug' => 'banana-pao-assada',                     'active' => true), 
            array('name' => 'puré de batata rena' ,                  'category_id'=> $partnerCategory->id, 'slug' => 'pure-de-batata-rena',                   'active' => true), 
            array('name' => 'puré de batata doce',                   'category_id'=> $partnerCategory->id, 'slug' => 'pure-de-batata-doce',                   'active' => true), 
            array('name' => 'puré de banana pão',                    'category_id'=> $partnerCategory->id, 'slug' => 'pure-de-banana-pao',                    'active' => true), 
            array('name' => 'puré de abóbora',                       'category_id'=> $partnerCategory->id, 'slug' => 'pure-de-abobora',                       'active' => true), 
            array('name' => 'puré de ervilhas',                      'category_id'=> $partnerCategory->id, 'slug' => 'pure-de-ervilhas',                      'active' => true), 
            array('name' => 'puré de cenoura',                       'category_id'=> $partnerCategory->id, 'slug' => 'pure-de-cenoura',                       'active' => true), 
            array('name' => 'puré de batata rena com trufas',        'category_id'=> $partnerCategory->id, 'slug' => 'pure-de-batata-rena-com-trufas',        'active' => true), 
            array('name' => 'feijão preto',                          'category_id'=> $partnerCategory->id, 'slug' => 'feijao-preto',                          'active' => true), 
            array('name' => 'feijão manteiga',                       'category_id'=> $partnerCategory->id, 'slug' => 'feijao-manteiga',                       'active' => true), 
            array('name' => 'feijão de óleo de palma',               'category_id'=> $partnerCategory->id, 'slug' => 'feijao-de-oleo-de-palma',               'active' => true), 
            array('name' => 'funge de bombó',                        'category_id'=> $partnerCategory->id, 'slug' => 'funge-de-bombo',                        'active' => true), 
            array('name' => 'funge de milho',                        'category_id'=> $partnerCategory->id, 'slug' => 'funge-de-milho',                        'active' => true), 
            array('name' => 'funge de mistura',                      'category_id'=> $partnerCategory->id, 'slug' => 'funge-de-mistura',                      'active' => true), 
            array('name' => 'kizaca simples',                        'category_id'=> $partnerCategory->id, 'slug' => 'kizaca-simples',                        'active' => true), 
            array('name' => 'kizaca com moamba de ginguba',          'category_id'=> $partnerCategory->id, 'slug' => 'kizaca-com-moamba-de-ginguba',          'active' => true), 
            array('name' => 'kizaca com muteta',                     'category_id'=> $partnerCategory->id, 'slug' => 'kizaca-com-muteta',                     'active' => true), 
            array('name' => 'mengueleca',                            'category_id'=> $partnerCategory->id, 'slug' => 'mengueleca',                            'active' => true), 
            array('name' => 'kiabos cozidos',                        'category_id'=> $partnerCategory->id, 'slug' => 'kiabos-cozidos',                        'active' => true), 
            array('name' => 'kiabos grelhados',                      'category_id'=> $partnerCategory->id, 'slug' => 'kiabos-grelhados',                      'active' => true), 
            array('name' => 'erva de feijão',                        'category_id'=> $partnerCategory->id, 'slug' => 'erva-de-feijao',                        'active' => true), 
            array('name' => 'espinafre salteados',                   'category_id'=> $partnerCategory->id, 'slug' => 'espinafre-salteados',                   'active' => true), 
            array('name' => 'fumboa',                                'category_id'=> $partnerCategory->id, 'slug' => 'fumboa',                                'active' => true), 
            array('name' => 'gimboa refogada',                       'category_id'=> $partnerCategory->id, 'slug' => 'gimboa-refogada',                       'active' => true), 
            array('name' => 'farofia',                               'category_id'=> $partnerCategory->id, 'slug' => 'farofia',                               'active' => true), 
            array('name' => 'mandioca cozida',                       'category_id'=> $partnerCategory->id, 'slug' => 'mandioca-cozida',                       'active' => true), 
            array('name' => 'mandioca frita',                        'category_id'=> $partnerCategory->id, 'slug' => 'mandioca-frita',                        'active' => true), 
            array('name' => 'pure de mandioca',                      'category_id'=> $partnerCategory->id, 'slug' => 'pure-de-mandioca',                      'active' => true), 
            array('name' => 'beringela recheada',                    'category_id'=> $partnerCategory->id, 'slug' => 'beringela-recheada',                    'active' => true), 
            array('name' => 'pimentos recheados',                    'category_id'=> $partnerCategory->id, 'slug' => 'pimentos-recheados',                    'active' => true), 
            array('name' => 'Cogumelos salteados',                   'category_id'=> $partnerCategory->id, 'slug' => 'cogumelos-salteados',                   'active' => true), 
            array('name' => 'Tortulho',                              'category_id'=> $partnerCategory->id, 'slug' => 'tortulho',                              'active' => true), 
            array('name' => 'abacate',                               'category_id'=> $partnerCategory->id, 'slug' => 'abacate',                               'active' => true), 
            array('name' => 'ovo cozido',                            'category_id'=> $partnerCategory->id, 'slug' => 'ovo-cozido',                            'active' => true), 
            array('name' => 'ovo estrelado',                         'category_id'=> $partnerCategory->id, 'slug' => 'ovo-estrelado',                         'active' => true), 
            array('name' => 'tomate',                                'category_id'=> $partnerCategory->id, 'slug' => 'tomate',                                'active' => true), 
            array('name' => 'feijão verde',                          'category_id'=> $partnerCategory->id, 'slug' => 'feijao-verde',                          'active' => true), 
            array('name' => 'couve',                                 'category_id'=> $partnerCategory->id, 'slug' => 'couve',                                 'active' => true), 
            array('name' => 'couve chinesa',                         'category_id'=> $partnerCategory->id, 'slug' => 'couve-chinesa',                         'active' => true), 
            array('name' => 'couve flor',                            'category_id'=> $partnerCategory->id, 'slug' => 'couve-flor',                            'active' => true), 
            array('name' => 'pure de couve flor',                    'category_id'=> $partnerCategory->id, 'slug' => 'pure-de-couve-flor',                    'active' => true), 
            array('name' => 'arroz de couve flor',                   'category_id'=> $partnerCategory->id, 'slug' => 'arroz-de-couve-flor',                   'active' => true), 
            array('name' => 'repolho',                               'category_id'=> $partnerCategory->id, 'slug' => 'repolho',                               'active' => true), 
            array('name' => 'repolho roxo',                          'category_id'=> $partnerCategory->id, 'slug' => 'repolho-roxo',                          'active' => true), 
            array('name' => 'broculos',                              'category_id'=> $partnerCategory->id, 'slug' => 'broculos',                              'active' => true), 
            array('name' => 'corgette',                              'category_id'=> $partnerCategory->id, 'slug' => 'corgette',                              'active' => true), 
            array('name' => 'espargete de corgette',                 'category_id'=> $partnerCategory->id, 'slug' => 'espargete-de-corgette',                 'active' => true), 
            array('name' => 'massa tortellini',                      'category_id'=> $partnerCategory->id, 'slug' => 'massa-tortellini',                      'active' => true), 
            array('name' => 'massa fusilli',                         'category_id'=> $partnerCategory->id, 'slug' => 'massa-fusilli',                         'active' => true), 
            array('name' => 'massa tagliatelli',                     'category_id'=> $partnerCategory->id, 'slug' => 'massa-tagliatelli',                     'active' => true), 
            array('name' => 'azeitonas pretas',                      'category_id'=> $partnerCategory->id, 'slug' => 'azeitonas-pretas',                      'active' => true), 
            array('name' => 'broa',                                  'category_id'=> $partnerCategory->id, 'slug' => 'broa',                                  'active' => true), 
            array('name' => 'azeitonas verdes',                      'category_id'=> $partnerCategory->id, 'slug' => 'azeitonas-verdes',                      'active' => true), 
            array('name' => 'milho',                                 'category_id'=> $partnerCategory->id, 'slug' => 'milho',                                 'active' => true), 
            array('name' => 'catato',                                'category_id'=> $partnerCategory->id, 'slug' => 'catato',                                'active' => true), 
        );

        Side::insert($data);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = array(
            array(
                'name'        => '10%',  
                'description' => '10% de desconto no valor do produto',   
                'type'        => 'percentage-item', 
                'percentage'  => 10, 
                'active'      => true,   
                'code'        => null,
                'start_date'  => date("Y-m-d h:i:s", strtotime("today")), 
                'finish_date' => date("Y-m-d h:i:s", strtotime("+3 Months") 
            )),
            array(
                'name'        => '25%',  
                'description' => '25% de desconto no valor da compra', 
                'type'        => 'percentage-purchase',   
                'percentage'  => 25, 
                'active'      => true,   
                'code'        => null,
                'start_date'  => date("Y-m-d h:i:s", strtotime("today")), 
                'finish_date' => date("Y-m-d h:i:s", strtotime("+3 Months") 
            )),
            array(
                'name'        => 'Promoção de férias',  
                'description' => 'Desconto de 10% ao inserir o código promocional',   
                'type'        => 'percentage-purchase',   
                'percentage'  => 10, 
                'active'      => true, 
                'code'        => 'FERIAS2021',
                'start_date'  => date("Y-m-d h:i:s", strtotime("today")), 
                'finish_date' => date("Y-m-d h:i:s", strtotime("+3 Months") 
            )),
            array(
                'name'        => 'Promoção de ano novo',  
                'description' => 'Desconto de 15% ao inserir o código promocional',   
                'type'        => 'percentage-purchase',   
                'percentage'  => 15, 
                'active'      => false, 
                'code'        => 'iGO2021',
                'start_date'  => date("Y-m-d h:i:s", strtotime("today")), 
                'finish_date' => date("Y-m-d h:i:s", strtotime("+3 Months") 
            )),
        );
        
        Campaign::insert($data);
    }
}

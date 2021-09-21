<?php

namespace Database\Seeders;

use App\Models\County;
use App\Models\ShippingFee;
use Illuminate\Database\Seeder;

class ShippingFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $luanda        = County::where('name', 'Luanda')->first();
        $cazenga       = County::where('name', 'Cazenga')->first();
        $kilamba_kiaxi = County::where('name', 'Kilamba Kiaxi')->first();
        $belas         = County::where('name', 'Belas')->first();
        $icolo_e_bengo = County::where('name', 'Icolo e Bengo')->first();
        $talatona      = County::where('name', 'Talatona')->first();
        $cacuaco       = County::where('name', 'Cacuaco')->first();
        $quicama       = County::where('name', 'Quiçama')->first();
        $viana         = County::where('name', 'Viana')->first();
       

        $data = array(
            array('delivery_from' => $luanda->id, 'delivery_to' => $belas->id,         'price' => 2500),
            array('delivery_from' => $luanda->id, 'delivery_to' => $cacuaco->id,       'price' => 1500),
            array('delivery_from' => $luanda->id, 'delivery_to' => $cazenga->id,       'price' => 1200),
            array('delivery_from' => $luanda->id, 'delivery_to' => $icolo_e_bengo->id, 'price' => 6000),
            array('delivery_from' => $luanda->id, 'delivery_to' => $luanda->id,        'price' => 1000),
            array('delivery_from' => $luanda->id, 'delivery_to' => $quicama->id,       'price' => 20000),
            array('delivery_from' => $luanda->id, 'delivery_to' => $kilamba_kiaxi->id, 'price' => 1200),
            array('delivery_from' => $luanda->id, 'delivery_to' => $talatona->id,      'price' => 2000),
            array('delivery_from' => $luanda->id, 'delivery_to' => $viana->id,         'price' => 2000),

            array('delivery_from' => $cazenga->id, 'delivery_to' => $belas->id,         'price' => 2500),
            array('delivery_from' => $cazenga->id, 'delivery_to' => $cacuaco->id,       'price' => 1500),
            array('delivery_from' => $cazenga->id, 'delivery_to' => $cazenga->id,       'price' => 800),
            array('delivery_from' => $cazenga->id, 'delivery_to' => $icolo_e_bengo->id, 'price' => 5000),
            array('delivery_from' => $cazenga->id, 'delivery_to' => $luanda->id,        'price' => 1200),
            array('delivery_from' => $cazenga->id, 'delivery_to' => $quicama->id,       'price' => 20000),
            array('delivery_from' => $cazenga->id, 'delivery_to' => $talatona->id,      'price' => 1200),
            array('delivery_from' => $cazenga->id, 'delivery_to' => $viana->id,         'price' => 2000),
            array('delivery_from' => $cazenga->id, 'delivery_to' => $viana->id,         'price' => 1500),
            
            array('delivery_from' => $kilamba_kiaxi->id, 'delivery_to' => $belas->id,         'price' => 2500),
            array('delivery_from' => $kilamba_kiaxi->id, 'delivery_to' => $cacuaco->id,       'price' => 1800),
            array('delivery_from' => $kilamba_kiaxi->id, 'delivery_to' => $cazenga->id,       'price' => 1000),
            array('delivery_from' => $kilamba_kiaxi->id, 'delivery_to' => $icolo_e_bengo->id, 'price' => 3500),
            array('delivery_from' => $kilamba_kiaxi->id, 'delivery_to' => $luanda->id,        'price' => 1000),
            array('delivery_from' => $kilamba_kiaxi->id, 'delivery_to' => $quicama->id,       'price' => 20000),
            array('delivery_from' => $kilamba_kiaxi->id, 'delivery_to' => $kilamba_kiaxi->id, 'price' => 1000),
            array('delivery_from' => $kilamba_kiaxi->id, 'delivery_to' => $talatona->id,      'price' => 1200),
            array('delivery_from' => $kilamba_kiaxi->id, 'delivery_to' => $viana->id,         'price' => 1500),

            array('delivery_from' => $belas->id, 'delivery_to' => $belas->id,         'price' => 1000),
            array('delivery_from' => $belas->id, 'delivery_to' => $cacuaco->id,       'price' => 3000),
            array('delivery_from' => $belas->id, 'delivery_to' => $cazenga->id,       'price' => 2500),
            array('delivery_from' => $belas->id, 'delivery_to' => $icolo_e_bengo->id, 'price' => 5000),
            array('delivery_from' => $belas->id, 'delivery_to' => $luanda->id,        'price' => 2500),
            array('delivery_from' => $belas->id, 'delivery_to' => $quicama->id,       'price' => 18000),
            array('delivery_from' => $belas->id, 'delivery_to' => $kilamba_kiaxi->id, 'price' => 2500),
            array('delivery_from' => $belas->id, 'delivery_to' => $talatona->id,      'price' => 1800),
            array('delivery_from' => $belas->id, 'delivery_to' => $viana->id,         'price' => 2000),

            array('delivery_from' => $icolo_e_bengo->id, 'delivery_to' => $belas->id,         'price' => 5000),
            array('delivery_from' => $icolo_e_bengo->id, 'delivery_to' => $cacuaco->id,       'price' => 3000),
            array('delivery_from' => $icolo_e_bengo->id, 'delivery_to' => $cazenga->id,       'price' => 4500),
            array('delivery_from' => $icolo_e_bengo->id, 'delivery_to' => $icolo_e_bengo->id, 'price' => 1500),
            array('delivery_from' => $icolo_e_bengo->id, 'delivery_to' => $luanda->id,        'price' => 5500),
            array('delivery_from' => $icolo_e_bengo->id, 'delivery_to' => $quicama->id,       'price' => 15000),
            array('delivery_from' => $icolo_e_bengo->id, 'delivery_to' => $kilamba_kiaxi->id, 'price' => 5500),
            array('delivery_from' => $icolo_e_bengo->id, 'delivery_to' => $talatona->id,      'price' => 6500),
            array('delivery_from' => $icolo_e_bengo->id, 'delivery_to' => $viana->id,         'price' => 3000),

            array('delivery_from' => $talatona->id, 'delivery_to' => $belas->id,         'price' => 1500),
            array('delivery_from' => $talatona->id, 'delivery_to' => $cacuaco->id,       'price' => 5000),
            array('delivery_from' => $talatona->id, 'delivery_to' => $cazenga->id,       'price' => 5000),
            array('delivery_from' => $talatona->id, 'delivery_to' => $icolo_e_bengo->id, 'price' => 6500),
            array('delivery_from' => $talatona->id, 'delivery_to' => $luanda->id,        'price' => 2000),
            array('delivery_from' => $talatona->id, 'delivery_to' => $quicama->id,       'price' => 20000),
            array('delivery_from' => $talatona->id, 'delivery_to' => $kilamba_kiaxi->id, 'price' => 1200),
            array('delivery_from' => $talatona->id, 'delivery_to' => $talatona->id,      'price' => 1000),
            array('delivery_from' => $talatona->id, 'delivery_to' => $viana->id,         'price' => 3500),

            array('delivery_from' => $cacuaco->id, 'delivery_to' => $belas->id,         'price' => 3000),
            array('delivery_from' => $cacuaco->id, 'delivery_to' => $cacuaco->id,       'price' => 1000),
            array('delivery_from' => $cacuaco->id, 'delivery_to' => $cazenga->id,       'price' => 1500),
            array('delivery_from' => $cacuaco->id, 'delivery_to' => $icolo_e_bengo->id, 'price' => 3000),
            array('delivery_from' => $cacuaco->id, 'delivery_to' => $luanda->id,        'price' => 1500),
            array('delivery_from' => $cacuaco->id, 'delivery_to' => $quicama->id,       'price' => 35000),
            array('delivery_from' => $cacuaco->id, 'delivery_to' => $kilamba_kiaxi->id, 'price' => 1800),
            array('delivery_from' => $cacuaco->id, 'delivery_to' => $talatona->id,      'price' => 5000),
            array('delivery_from' => $cacuaco->id, 'delivery_to' => $viana->id,         'price' => 2500),

            array('delivery_from' => $quicama->id, 'delivery_to' => $belas->id,         'price' => 20000),
            array('delivery_from' => $quicama->id, 'delivery_to' => $cacuaco->id,       'price' => 35000),
            array('delivery_from' => $quicama->id, 'delivery_to' => $cazenga->id,       'price' => 20000),
            array('delivery_from' => $quicama->id, 'delivery_to' => $icolo_e_bengo->id, 'price' => 15000),
            array('delivery_from' => $quicama->id, 'delivery_to' => $luanda->id,        'price' => 20000),
            array('delivery_from' => $quicama->id, 'delivery_to' => $quicama->id,       'price' => 3000),
            array('delivery_from' => $quicama->id, 'delivery_to' => $kilamba_kiaxi->id, 'price' => 20000),
            array('delivery_from' => $quicama->id, 'delivery_to' => $talatona->id,      'price' => 20000),
            array('delivery_from' => $quicama->id, 'delivery_to' => $viana->id,         'price' => 18000),

            array('delivery_from' => $viana->id, 'delivery_to' => $belas->id,         'price' => 2000),
            array('delivery_from' => $viana->id, 'delivery_to' => $cacuaco->id,       'price' => 2500),
            array('delivery_from' => $viana->id, 'delivery_to' => $cazenga->id,       'price' => 1500),
            array('delivery_from' => $viana->id, 'delivery_to' => $icolo_e_bengo->id, 'price' => 3000),
            array('delivery_from' => $viana->id, 'delivery_to' => $luanda->id,        'price' => 2000),
            array('delivery_from' => $viana->id, 'delivery_to' => $quicama->id,       'price' => 18000),
            array('delivery_from' => $viana->id, 'delivery_to' => $kilamba_kiaxi->id, 'price' => 1500),
            array('delivery_from' => $viana->id, 'delivery_to' => $talatona->id,      'price' => 3500),
            array('delivery_from' => $viana->id, 'delivery_to' => $viana->id,         'price' => 1800),
        );
        
        ShippingFee::insert($data);
    }
}

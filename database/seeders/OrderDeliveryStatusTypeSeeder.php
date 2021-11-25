<?php

namespace Database\Seeders;

use App\Models\OrderDeliveryStatusType;
use Illuminate\Database\Seeder;

class OrderDeliveryStatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name' => 'Em curso',  'description' => 'Pedido Aceito'),
            array('name' => 'Em curso',  'description' => 'Pedido em Curso'),
            array('name' => 'Entregue',  'description' => 'Pedido Entregue'),
            array('name' => 'Recusado',  'description' => 'Pedido Recusado'),
            array('name' => 'Cancelado', 'description' => 'Pedido Cancelado'),
        );
        
        OrderDeliveryStatusType::insert($data);
    }
}

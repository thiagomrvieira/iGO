<?php

namespace Database\Seeders;

use App\Models\OrderStatusType;
use Illuminate\Database\Seeder;

class OrderStatusTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name' => 'Aberto'),
            array('name' => 'Submetido'),
            array('name' => 'Novo pedido Aderente'),
            array('name' => 'Pedido em Curso Aderente'),
            array('name' => 'Novo pedido Estafeta'),
            array('name' => 'Pedido Concluído Aderente'),
            array('name' => 'Pedido em Curso Estafeta'),
            array('name' => 'Pedido Concluído Estafeta'),
            array('name' => 'Pedido Concluído Estafeta'),
            array('name' => 'Pedido Cancelado'),
            
        );
        
        OrderStatusType::insert($data);
    }
}

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
            array('name' => 'Aberto',    'description' => 'Pedido aberto'),
            array('name' => 'Submetido', 'description' => 'Pedido submetido'),
            array('name' => 'Em curso',  'description' => 'Novo pedido Aderente'),
            array('name' => 'Em curso',  'description' => 'Pedido em Curso Aderente'),
            array('name' => 'Em curso',  'description' => 'Novo pedido Estafeta'),
            array('name' => 'Em curso',  'description' => 'Pedido Concluído Aderente'),
            array('name' => 'Em curso',  'description' => 'Pedido em Curso Estafeta'),
            array('name' => 'Entregue',  'description' => 'Pedido Concluído Estafeta'),
            array('name' => 'Cancelado', 'description' => 'Pedido Cancelado'),
        );
        
        OrderStatusType::insert($data);
    }
}

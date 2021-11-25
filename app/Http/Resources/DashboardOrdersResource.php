<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DashboardOrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            
            'new_orders' => [
                'label'        => 'Novos pedidos',
                'orders_count' => $this->newOrders->count(),  
                'last_entry'   => $this->newOrders->last()->created_at ?? null,
            ],
            'in_progress_orders' => [
                'label'        => 'Pedidos em curso',
                'orders_count' => $this->inProgressOrders->count(),  
                'last_entry'   => $this->inProgressOrders->last()->created_at ?? null,
            ],
            'completed_orders' => [
                'label'        => 'Pedidos concluídos',
                'orders_count' => $this->completedOrders->count(),  
                'last_entry'   => $this->completedOrders->last()->created_at ?? null,
            ],
            'refused_orders' => [
                'label'        => 'Pedidos recusados',
                'orders_count' => $this->refusedOrders->count(),  
                'last_entry'   => $this->refusedOrders->last()->created_at ?? null,
            ],
            
        ];
    }
}

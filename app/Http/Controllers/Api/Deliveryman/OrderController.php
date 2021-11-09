<?php

namespace App\Http\Controllers\Api\Deliveryman;

use App\Http\Controllers\Controller;
use App\Http\Resources\DashboardOrdersResource;
use App\Http\Traits\OrderTrait;
use App\Models\DeliverymanOrder;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use OrderTrait;

    protected $newOrders;

    public function __construct()
    {
        #   Get new orders
        $this->newOrders = Order::whereIn('order_status_type_id', array(4, 5, 6) )->doesntHave('deliverymen')->get() ?? [];   
    }

    /**
     * SHOW ORDERS DATA - Dashboard 
     * *
     * 
     * @OA\Get(path="/api/v1/deliveryman/orders",
     *   tags={"Deliveryman: Orders"},
     *   summary="Show orders data to deliveryman",
     *   description="Display quantity and last entry for new, in progress, finished and refused orders",
     *   operationId="showOrdersForDeliveryman",
     *   
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *               "status": "success",
     *               "message": "Dados dos pedidos",
     *               "data": {
     *                   "new_orders": {
     *                      "label": "string",
     *                      "orders_count": "integer",
     *                      "last_entry": "datetime or null"
     *                   },
     *                   "in_progress_orders": {
     *                      "label": "string",
     *                      "orders_count": "integer",
     *                      "last_entry": "datetime or null"
     *                   },
     *                   "completed_orders": {
     *                      "label": "string",
     *                      "orders_count": "integer",
     *                      "last_entry":"datetime or null"
     *                   },
     *                   "refused_orders": {
     *                      "label": "string",
     *                      "orders_count": "integer",
     *                      "last_entry": "datetime or null"
     *                   }
     *               }
     *           }
     *      ),
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400, 
     *      description="Bad request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Not found"
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   ),
     *   security={
     *     {"api_key": {}}
     *   }
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = (object) [
            'newOrders'        => $this->newOrders,
            'inProgressOrders' => $this->inProgressOrders(),
            'completedOrders'  => $this->completedOrders(),
            'refusedOrders'    => $this->refusedOrders(),
        ];

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Dados dos pedidos',
                                 'data'    => new DashboardOrdersResource($data) ?? null], $statusCode ?? 200); 
    }

    
   
}

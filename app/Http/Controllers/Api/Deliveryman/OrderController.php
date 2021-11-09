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
        $this->newOrders        = Order::whereIn('order_status_type_id', array(4, 5, 6) )->doesntHave('deliverymen')->get() ?? [];   
    }

    /**
     * DISPLAY A LIST OF USER ORDERS FOR DELIVERYMAN
     * *
     * 
     * @OA\Get(path="/api/v1/deliveryman/orders",
     *   tags={"Deliveryman: Orders"},
     *   summary="Show all client order",
     *   description="Display a list of all client orders ",
     *   operationId="showOrdersForDeliveryman",
     *   
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "histórico de pedidos",
     *              "data": {
     *                  "orders" : {
     *                      {
     *                       "id": "integer",
     *                       "status": "string",
     *                       "description": "string",
     *                       "date": "datetime",
     *                       "partner": {
     *                          "id": "integer",
     *                          "name": "string",
     *                          "image": "string",
     *                       },
     *                      }
     *                  }

     *              },
     *           },
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

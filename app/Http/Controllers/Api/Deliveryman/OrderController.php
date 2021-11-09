<?php

namespace App\Http\Controllers\Api\Deliveryman;

use App\Http\Controllers\Controller;
use App\Models\DeliverymanOrder;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
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
        #   Count new orders
        $this->newOrders->count();
        #   Count order in progress
        $this->inProgressOrders()->count();
        #   Count order completed
        $this->completedOrders()->count();
        #   Count order refused
        $this->refusedOrders()->count();

        
        $data = [];
       
        
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não há pedidos para exibir!',
                                 'data'    => $data    ?? null], $statusCode ?? 200); 
    }

    
    /**
     * GET ORDERS IN PROGRESS (order status type id between 4, 5, 6, 7 and related to the logged deliveryman)
     */
    public function inProgressOrders()
    {
        return Order::whereIn('order_status_type_id', array(4, 5, 6, 7) )->whereHas('deliverymen', function (Builder $query) {
            $query->where('deliveryman_id',  Auth::user()->deliveryman->id);
        })->get() ?? [];
    }

    /**
     * GET ORDERS COMPLETED (order status type id 8 and related to the logged deliveryman)
     */
    public function completedOrders()
    {
        return Order::where('order_status_type_id', 8)->whereHas('deliverymen', function (Builder $query) {
            $query->where('deliveryman_id',  Auth::user()->deliveryman->id);
        })->get() ?? [];
    }

    /**
     * GET ORDERS REFUSED (order related to the logged deliveryman and with order_delivery_status_type_id 4)
     */
    public function refusedOrders()
    {
        return Order::whereHas('deliverymen', function (Builder $query) {
            $query->where('deliveryman_id',  Auth::user()->deliveryman->id)
                  ->where('order_delivery_status_type_id',  4);
        })->get() ?? [];
    }
}

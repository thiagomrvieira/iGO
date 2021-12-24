<?php

namespace App\Http\Controllers\Api\Deliveryman;

use App\Http\Controllers\Controller;
use App\Http\Resources\DashboardOrdersResource;
use App\Http\Resources\DeliverymanOrderCollection;
use App\Http\Resources\OrderCollection;
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


    /**
     * SHOW IN NEW ORDERS 
     * *
     * 
     * @OA\Get(path="/api/v1/deliveryman/orders/new",
     *   tags={"Deliveryman: Orders"},
     *   summary="Show new orders",
     *   description="Display a list of new orders to deliveryman",
     *   operationId="newOrdersForDeliveryman",
     *   
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *               "status": "success",
     *               "message": "Novos pedidos",
     *               "data": {
     *                  "orders": {
     *                      {
     *                          "id": "integer",
     *                          "status": "string",
     *                          "description": "string",
     *                          "date": "datetime",
     *                          "partner": {
     *                              "id": "integer",
     *                              "name": "string",
     *                              "image": "string"
     *                          }
     *                      }
     *                  }
     *              }
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
    public function getNewOrderList()
    {
        if ($this->newOrders->count() > 0) {
            $data       = new DeliverymanOrderCollection( $this->newOrders );
            $status     = "success";
            $message    = "Novos pedidos"; 
            $statusCode = 200;
        }

        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não há novos pedidos',
                                 'data'    => $data    ?? null 
                                ], $statusCode ?? 404); 
    }


    /**
     * SHOW IN PROGRESS ORDERS 
     * *
     * 
     * @OA\Get(path="/api/v1/deliveryman/orders/inprogress",
     *   tags={"Deliveryman: Orders"},
     *   summary="Show in progress orders",
     *   description="Display a list of all in progress orders to deliveryman",
     *   operationId="inProgressOrdersForDeliveryman",
     *   
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *               "status": "success",
     *               "message": "Pedidos em andamento",
     *               "data": {
     *                  "orders": {
     *                      {
     *                          "id": "integer",
     *                          "status": "string",
     *                          "description": "string",
     *                          "date": "datetime",
     *                          "partner": {
     *                              "id": "integer",
     *                              "name": "string",
     *                              "image": "string"
     *                          }
     *                      }
     *                  }
     *              }
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
    public function getInProgressOrderList()
    {
        if ($this->inProgressOrders()->count() > 0) {
            $data       = new DeliverymanOrderCollection( $this->inProgressOrders() );
            $status     = "success";
            $message    = "Pedidos andamento"; 
            $statusCode = 200;
        }

        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não há pedidos andamento',
                                 'data'    => $data    ?? null 
                                ], $statusCode ?? 404); 
    }
   

    /**
     * SHOW COMPLETED ORDERS 
     * *
     * 
     * @OA\Get(path="/api/v1/deliveryman/orders/completed",
     *   tags={"Deliveryman: Orders"},
     *   summary="Show completed orders",
     *   description="Display a list of all completed orders to deliveryman",
     *   operationId="completedOrdersForDeliveryman",
     *   
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *               "status": "success",
     *               "message": "Pedidos concluídos",
     *               "data": {
     *                  "orders": {
     *                      {
     *                          "id": "integer",
     *                          "status": "string",
     *                          "description": "string",
     *                          "date": "datetime",
     *                          "partner": {
     *                              "id": "integer",
     *                              "name": "string",
     *                              "image": "string"
     *                          }
     *                      }
     *                  }
     *              }
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
    public function getCompletedOrderList()
    {
        if ($this->completedOrders()->count() > 0) {
            $data       = new DeliverymanOrderCollection( $this->completedOrders() );
            $status     = "success";
            $message    = "Pedidos concluídos"; 
            $statusCode = 200;
        }

        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não há pedidos concluídos',
                                 'data'    => $data    ?? null 
                                ], $statusCode ?? 404); 

    }


    /**
     * SHOW REFUSED ORDERS 
     * *
     * 
     * @OA\Get(path="/api/v1/deliveryman/orders/refused",
     *   tags={"Deliveryman: Orders"},
     *   summary="Show refused orders",
     *   description="Display a list of all refused orders to deliveryman",
     *   operationId="refusedOrdersForDeliveryman",
     *   
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *               "status": "success",
     *               "message": "Pedidos recusados",
     *               "data": {
     *                  "orders": {
     *                      {
     *                          "id": "integer",
     *                          "status": "string",
     *                          "description": "string",
     *                          "date": "datetime",
     *                          "partner": {
     *                              "id": "integer",
     *                              "name": "string",
     *                              "image": "string"
     *                          }
     *                      }
     *                  }
     *              }
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
    public function getRefusedOrderList()
    {
        if ($this->refusedOrders()->count() > 0) {
            $data       = new DeliverymanOrderCollection( $this->refusedOrders() );
            $status     = "success";
            $message    = "Pedidos recusados"; 
            $statusCode = 200;
        }

        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não há pedidos recusados',
                                 'data'    => $data ?? null 
                                ], $statusCode ?? 404); 
    }

    /**
     * GET THE SPECIFIED ORDER 
     * *
     * 
     * @OA\Get(path="/api/v1/deliveryman/orders/{id}/accept",
     *   tags={"Deliveryman: Orders"},
     *   summary="Get/Accept the specified order",
     *   description="Make the Deliveryman responsible for delivering the specified Order",
     *   operationId="deliverymanGetOrder",
     *   @OA\Parameter(
     *      name="id",
     *      description="Order id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *               "status": "success",
     *               "message": "Pedido aceito",
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
    public function acceptOrder($id)
    {
        #   Check if the Order is related with any deliveryman 
        if (Order::where('id', $id )->whereIn('order_status_type_id', array(4, 5, 6))->doesntHave('deliverymen')->get()->count() > 0) {

            DeliverymanOrder::create([
                'deliveryman_id'                => Auth::user()->deliveryman->id, 
                'order_id'                      => $id,
                'order_delivery_status_type_id' => 1
            ]);

            $status     = "success";
            $message    = "Pedido aceito"; 
            $statusCode = 200;
        }

        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não foi possível aceitar o pedido especificado!',
                                ], $statusCode ?? 404); 
    }
}

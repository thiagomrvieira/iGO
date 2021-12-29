<?php

namespace App\Http\Controllers\api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\CheckoutOrderResource;
use App\Http\Resources\DashboardOrdersResource;
use App\Http\Resources\DeliverymanOrderCollection;
use App\Http\Resources\OrderForPartnerResource;
use App\Http\Resources\PartnerOrderCollection;
use App\Http\Traits\OrderTrait;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use OrderTrait;

    /**
     * SHOW ORDERS DATA - Dashboard 
     * *
     * 
     * @OA\Get(path="/api/v1/partner/orders",
     *   tags={"Partner: Orders"},
     *   summary="Show orders data to Partner",
     *   description="Display quantity and last entry for new, in progress, finished and refused orders",
     *   operationId="showOrdersForPartner",
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
            'newOrders'        => $this->newOrdersForPartner(),
            'inProgressOrders' => $this->inProgressOrdersForPartner(),
            'completedOrders'  => $this->completedOrdersForPartner(),
            'refusedOrders'    => $this->refusedOrdersForPartner(),
        ];

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Dados dos pedidos',
                                 'data'    => new DashboardOrdersResource($data) ?? null
                                ], $statusCode ?? 200); 
    }
    
    /**
     * SHOW NEW ORDERS FOR PARTNER
     * *
     * 
     * @OA\Get(path="/api/v1/partner/orders/new",
     *   tags={"Partner: Orders"},
     *   summary="Show new orders",
     *   description="Display a list of new orders to partner",
     *   operationId="newOrdersForPartner",
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
     *                      }
     *                  },
     *                  "partner": {
     *                      "id": "integer",
     *                      "name": "string",
     *                      "image": "string"
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
        $newOrders = $this->newOrdersForPartner();
        if ($newOrders->count() > 0) {
            $data       = new PartnerOrderCollection( $newOrders );
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
     **
     * 
     * @OA\Get(path="/api/v1/partner/orders/inprogress",
     *   tags={"Partner: Orders"},
     *   summary="Show in progress orders",
     *   description="Display a list of all in progress orders to Partner",
     *   operationId="inProgressOrdersForPartner",
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
     *                          
     *                      }
     *                  },
     *                  "partner": {
     *                      "id": "integer",
     *                      "name": "string",
     *                      "image": "string"
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
        $inProgressOrders = $this->inProgressOrdersForPartner();

        if ($inProgressOrders->count() > 0) {
            $data       = new PartnerOrderCollection( $inProgressOrders );
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
     **
     * 
     * @OA\Get(path="/api/v1/partner/orders/completed",
     *   tags={"Partner: Orders"},
     *   summary="Show completed orders",
     *   description="Display a list of all completed orders to Partner",
     *   operationId="completedOrdersForPartner",
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
     *                          
     *                      }
     *                  },
     *                  "partner": {
     *                      "id": "integer",
     *                      "name": "string",
     *                      "image": "string"
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
        $completedOrders = $this->completedOrdersForPartner();

        if ($completedOrders->count() > 0) {
            $data       = new PartnerOrderCollection( $completedOrders );
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
     **
     * 
     * @OA\Get(path="/api/v1/partner/orders/refused",
     *   tags={"Partner: Orders"},
     *   summary="Show refused orders",
     *   description="Display a list of all refused orders to Partner",
     *   operationId="refusedOrdersForPartner",
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
     *                          
     *                      }
     *                  },
     *                  "partner": {
     *                      "id": "integer",
     *                      "name": "string",
     *                      "image": "string"
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
        $refusedOrders = $this->refusedOrdersForPartner();

        if ($refusedOrders->count() > 0) {
            $data       = new PartnerOrderCollection( $refusedOrders );
            $status     = "success";
            $message    = "Pedidos recusados"; 
            $statusCode = 200;
        }

        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não há pedidos recusados',
                                 'data'    => $data    ?? null 
                                ], $statusCode ?? 404); 
    }

    /**
     * GET THE SPECIFIED ORDER 
     **
     * 
     * @OA\Get(path="/api/v1/partner/orders/{id}/accept",
     *   tags={"Partner: Orders"},
     *   summary="Get/Accept the specified order",
     *   description="Partner accept the specified Order",
     *   operationId="partnerGetOrder",
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
        #   Check if the Order has been submitted 
        $order = $this->getPartnerOrderById($id);

        if ($order->whereIn('order_status_type_id', array(2, 3))->count() > 0 ?? null) 
        {
            #   Change status to accepted
            $order->update(['order_status_type_id' => 4]);

            $status     = "success";
            $message    = "Pedido aceito"; 
            $statusCode = 200;
        }

        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não foi possível aceitar o pedido especificado!',
                                ], $statusCode ?? 404); 
    }

    /**
     * REFUSE THE SPECIFIED ORDER 
     **
     * 
     * @OA\Patch(path="/api/v1/partner/orders/{id}/refuse",
     *   tags={"Partner: Orders"},
     *   summary="Refuse the specified order",
     *   description="Partner refuse the specified Order",
     *   operationId="partnerRefuseOrder",
     *   @OA\Parameter(
     *      name="id",
     *      description="Order id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *   ),
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="refused_for", type="string", example="ruptura de estoque/No product in stock"),
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
    public function refuseOrder(Request $request, $id)
    {
        #   Check if the Order has been submitted 
        $order = $this->getPartnerOrderById($id);

        if ($order->whereIn('order_status_type_id', array(2, 3))->count() > 0 ?? null) 
        {
            #   Change status to refused/canceled and save the reason
            $order->update([
                'order_status_type_id' => 9,
                'refused_for'          => $request->refused_for
            ]);

            $status     = "success";
            $message    = "Pedido recusado"; 
            $statusCode = 200;
        }

        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não foi possível recusar o pedido especificado!',
                                ], $statusCode ?? 404); 
    }

    /**
     * FINISH THE SPECIFIED ORDER 
     **
     * 
     * @OA\Patch(path="/api/v1/partner/orders/{id}/finish",
     *   tags={"Partner: Orders"},
     *   summary="Partner finish the specified order",
     *   description="Make it visible for the Deliveryman to accept",
     *   operationId="partnerFinishOrder",
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
     *               "message": "Pedido submetido ao estafeta",
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
    public function finishOrder(Request $request, $id)
    {
        #   Check if the Order has been submitted 
        $order = $this->getPartnerOrderById($id);

        if ($order->where('order_status_type_id', 4)->count() > 0 ?? null) 
        {
            #   Change status to 
            $order->update([ 'order_status_type_id' => 5 ]);

            $status     = "success";
            $message    = "Pedido submetido ao estafeta"; 
            $statusCode = 200;
        }

        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não foi possível submeter o pedido ao estafeta!',
                                ], $statusCode ?? 404); 
    }

    /**
     * GET THE SPECIFIED ORDER
     * *
     * @OA\Get(path="/api/v1/partner/orders/{id}",
     *   tags={"Partner: Orders"},
     *   summary="Get the specified order",
     *   description="Return data of the specified order",
     *   operationId="getOrderforPartner",
      *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "checkout",
     *              "data": { 
     *                  "id": "integer",
     *                  "order_number": "string",
     *                  "products": {
     *                      { 
     *                          "partner": {
     *                              "id": "integer",
     *                              "name": "string",
     *                              "images": {
     *                                "image_cover": "string",
     *                                "image_01": "string",
     *                                "image_02": "string",
     *                                "image_03": "string",
     *                              },
     *                              "category": {
     *                                  "id": "integer",
     *                                  "name": "string",
     *                                  "image": "string",
     *                                  "parent_category": null
     *                              },    
     *                              "address": {
     *                                  "line_1": "string",
     *                                  "line_2": "string",
     *                                  "county": "string",
     *                                  "locality": "string",
     *                                  "post_code": "string",
     *                                  "country": "string"
     *                              },
     *                           },
     *                          "product": {
     *                              "id": "integer",
     *                              "name": "string",
     *                              "price": "float",
     *                              "quantity": "integer"
     *                          },
     *                          "options":
     *                          {
     *                              {
     *                                  "id": "integer",
     *                                  "name": "string",
     *                                  "values": {
     *                                      {
     *                                          "id": "integer",
     *                                          "name": "string",
     *                                          "price": "float",
     *                                      }
     *                                  },
     *                               },
     *                          },
     *                          "amount": "float",
     *                          "created_at": "datetime"
     *                      }, 
     *                  },
     *                  
     *                  "delivery_address": {
     *                      "id": "integer",
     *                      "address_name": "string",
     *                      "address_type": "string",
     *                      "address_line_1": "string",
     *                      "address_line_2": "string",
     *                      "county": {
     *                          "id": "integer",
     *                          "name": "string"
     *                      },
     *                      "locality": "string",
     *                      "post_code": "string",
     *                      "country": "string",
     *                      "tax_name": "string",
     *                      "tax_number": "string"
     *                  },
     *                  "delivery_time": "datetime",
     *                  "tax_data": {
     *                      "tax_name": "string",
     *                      "tax_number": "string"
     *                  },
     *                  "subtotal": "float",
     *                  "shipping_fee": "float",
     *                  "total": "float",
     *                  "discount": "float",
     *                  "total_final": "float",
     *              },
     *          },
     *      ),
     *      
     *   ),
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->getPartnerOrderById($id);

        if ($order->count() > 0) {
            $data        = new OrderForPartnerResource( $order->first() );
            $status      = "success";
            $message     = "Dados do pedido";
            $statusCode  = 200;
        }
        
        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não foi possivel encontrar o pedido especificado',
                                 'data'    => $data    ?? null], $statusCode ?? 404); 
    }
    
}

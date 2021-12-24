<?php

namespace App\Http\Controllers\api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\DashboardOrdersResource;
use App\Http\Resources\DeliverymanOrderCollection;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

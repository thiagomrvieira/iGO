<?php

namespace App\Http\Controllers\api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\DashboardOrdersResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
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

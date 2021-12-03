<?php

namespace App\Http\Controllers\Api\Client;


use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReceiptResource;
use App\Models\Receipt;

class ReceiptController extends Controller
{
    /**
     * GET THE SPECIFIED ORDER
     * *
     * @OA\Get(path="/api/v1/client/receipt/{id}",
     *   tags={"Client: Order Receipt"},
     *   summary="Get the specified receipt",
     *   description="Return data of the specified order",
     *   operationId="getOrderReceipt",
      *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *               "status": "success",
     *               "message": "Recibo",
     *               "data": {
     *                   "order_id": "integer",
     *                   "partner": {
     *                      "name": "string",
     *                      "address": "string",
     *                   },
     *                   "submitted_at": "datetime",
     *                   "sub_total": "integer",
     *                   "total": "integer",
     *                   "shipping_fee": "integer",
     *              }
     *           }
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id',  $id)
                      ->where('client_id', Auth::user()->client->id)
                      ->where('order_status_type_id', '<>', 1)->first();
        
        if ($order->count() > 0) 
        {
            
            $receipt = Receipt::firstOrCreate(['order_id' => $order->id],
                [
                    'order_id'     => $order->id,
                    'partner_id'   => $order->partner_id,
                    'subtotal'     => $order->subtotal(),        
                    'total'        => $order->total(),       
                    'shipping_fee' => $order->shippingFee(),         
                    'tax_name'     => $order->address->tax_name   ?? null,
                    'tax_number'   => $order->address->tax_number ?? null,
                ]);

            $data        = new ReceiptResource( $receipt );
            $status      = "success";
            $message     = "Recibo";
            $statusCode  = 200;
        }
        
        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não foi possivel encontrar o recibo para o pedido especificado',
                                 'data'    => $data    ?? null], $statusCode ?? 404); 
    }
}

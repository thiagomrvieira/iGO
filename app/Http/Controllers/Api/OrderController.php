<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CheckoutOrderResource;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Http\Traits\OrderTrait;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use OrderTrait;

    /**
     * DISPLAY A LIST OF ALL USER ORDERS
     * *
     * 
     * @OA\Get(path="/api/v1/orders",
     *   tags={"Orders"},
     *   summary="Show all client order",
     *   description="Display a list of all client orders ",
     *   operationId="showOrders",
     *   
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', '<>' , 1 )->where('order_status_type_id', '<>' , 2 )->count() > 0) {
            $data    = new OrderCollection(
                                 Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', '<>' , 1 )
                                      ->where('order_status_type_id', '<>' , 2 )->get()
                                    );
            $message = "histórico de pedidos";
        }
        
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não há histórico de pedidos',
                                 'data'    => $data    ?? null], 200); 
    }

    /**
     * DISPLAY A LIST OF ALL USER IN PROGRESS ORDERS 
     * *
     * 
     * @OA\Get(path="/api/v1/order/inprogress",
     *   tags={"Orders"},
     *   summary="Show all client orders in progress ",
     *   description="Display a list of all client orders in progress (status id between 3 and 5)",
     *   operationId="showInProgressOrders",
     *   
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
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
     * @return \Illuminate\Http\Response
     */
    public function inProgress()
    {

        if (Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', '<>' , 1 )->where('order_status_type_id', '<>' , 2 )->count() > 0) {
            $data    = new OrderCollection(
                                 Order::where('client_id', Auth::user()->client->id)
                                      ->whereIn('order_status_type_id', array(3, 4, 5, 6, 7) )->get()
                                    );
            $message = "Pedidos em curso";
        }
        
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não há pedidos em andamento',
                                 'data'    => $data    ?? null], 200); 
    }

    /**
     * Display chekout data
     * *
     * 
     * @OA\Get(path="/api/v1/order/checkout",
     *   tags={"Orders"},
     *   summary="Display order data",
     *   description="Show order details - Products, delivery, schedule, tax and payment data",
     *   operationId="showOrdersDetails",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
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
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        if (Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', 1 )->first()->cart->count() > 0) {
            $data    = new CheckoutOrderResource($this->firstOrCreateOrder());
            $message = "Chekout";
        }
        
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não há produtos no carrinho',
                                 'data'    => $data    ?? null], 200); 
    }


    /**
     * UPDATE DATA FROM ORDER
     * *
     * 
     * @OA\post(path="/api/v1/checkout",
     *   tags={"Orders"},
     *   summary="Checkout order",
     *   description="Update order data and if sent any paramter",
     *   operationId="checkout",
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="address_id", type="integer", example="2"),
     *          @OA\Property(property="deliver_at", type="string", example="2022-12-21 19:44"),
     *          @OA\Property(property="tax_name", type="string", example="Fulano da Silva"),
     *          @OA\Property(property="tax_number", type="integer", example="300 322 984"),
     *          @OA\Property(property="campaign_code", type="string", example="iGONATAL"),
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (isset(Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', 1 )->first()->cart)) {
            
            $this->checkoutOrderData($request); 
            
            return $this->checkout();
        }
        
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não há produtos no carrinho',
                                 'data'    => $data    ?? null], 200); 
       
    }


    /**
     * SUBMIT ORDER
     * *
     * 
     * @OA\post(path="/api/v1/orders/submit",
     *   tags={"Orders"},
     *   summary="Submit order",
     *   description="Change order status from Open to Submitted",
     *   operationId="submitOrder",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
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
     * @return \Illuminate\Http\Response
     */
    public function submit()
    {
        if (isset(Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', 1 )->first()->cart)) {
            $this->finishOrder(); 
            $message = "O seu pedido foi submetido!";
        }
        
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não há produtos no carrinho'], 200); 
       
    }
    
    /**
     * Show the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

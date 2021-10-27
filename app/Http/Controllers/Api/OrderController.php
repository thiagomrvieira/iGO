<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CheckoutOrderResource;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Http\Traits\OrderTrait;
use App\Models\Cart;
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
     * @OA\Get(path="/api/v1/client/orders",
     *   tags={"Client: Orders"},
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
        $order = Order::where('client_id', Auth::user()->client->id)
                      ->whereIn('order_status_type_id', array(8, 9) )->get();

        if ($order->count() > 0) {
            $data    = new OrderCollection( $order ) ;
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
     * @OA\Get(path="/api/v1/client/order/inprogress",
     *   tags={"Client: Orders"},
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
        $order = Order::where('client_id', Auth::user()->client->id)
                      ->whereIn('order_status_type_id', array(3, 4, 5, 6, 7) )->get();
                                    
        if ($order->count() > 0) {
            $data    = new OrderCollection( $order );
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
     * @OA\Get(path="/api/v1/client/order/checkout",
     *   tags={"Client: Orders"},
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
        $order     = Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', 1 )->first();
        $cartItems = Cart::where('order_id', $order)->get();
        
        if ($order && $cartItems->count() > 0) {
            $data    = new CheckoutOrderResource($order);
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
     * @OA\post(path="/api/v1/client/order/checkout",
     *   tags={"Client: Orders"},
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
     *          @OA\Property(property="campaign_code", type="string", example="FERIAS2021"),
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
        $order     = Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', 1 )->first();
        $cartItems = Cart::where('order_id', $order)->get();
        
        if ($order && $cartItems->count() > 0) {
            
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
     * @OA\post(path="/api/v1/client/order/submit",
     *   tags={"Client: Orders"},
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
        $order     = Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', 1 )->first();
        $cartItems = Cart::where('order_id', $order)->get();
        
        if ($order && $cartItems->count() > 0) {
            $this->finishOrder(); 
            $message = "O seu pedido foi submetido!";
        }
        
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não há produtos no carrinho'], 200); 
       
    }
    
    /**
     * GET THE SPECIFIED ORDER
     * *
     * @OA\Get(path="/api/v1/client/order/{id}",
     *   tags={"Client: Orders"},
     *   summary="Get the specified order",
     *   description="Return data of the specified order",
     *   operationId="getOrder",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
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
        $order = Order::where('id',  $id)->where('client_id', Auth::user()->client->id)->get();
        if ($order->count() > 0) {
            $data    = new CheckoutOrderResource( $order->first() );
            $message = "Dados do pedido";
        }
        
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não foi possivel encontrar o pedido especificado',
                                 'data'    => $data    ?? null], 200); 
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

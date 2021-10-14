<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        //
    }

    /**
     * Display chekout data
     * *
     * 
     * @OA\Get(path="/api/v1/checkout",
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
            $data    = $this->firstOrCreateOrder();
            $message = "Chekout";
        }
        
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não há produtos no carrinho',
                                 'data'    => $data    ?? null], 200); 
    }


    /**
     * CREATE A NEW ORDER
     * *
     * 
     
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        // return response()->json(['status'  => $status  ?? 'success',
        //                          'message' => $message ?? 'Produto adicionado ao carrinho',
        //                          'data'    => $order], 200); 
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
     * CHECKOUT
     * *
     * 
     * @OA\patch(path="/api/v1/checkout",
     *   tags={"Orders"},
     *   summary="Checkout order",
     *   description="Return order data and update if send any paramter",
     *   operationId="checkout",
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
        if (Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', 1 )->first()->cart->count() > 0) {
            
            #   Update order columns - OrderTrait
            $order = $this->checkoutOrder($request);        
            
            #   Update order_id columns in products in the cart
            // Cart::where('client_id', Auth::user()->client->id)->where('order_id', null)->update(['order_id' => $order->id]);

           
        }
        
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Resumo do pedido',
                                 'data'    => $order   ?? null], 200); 
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

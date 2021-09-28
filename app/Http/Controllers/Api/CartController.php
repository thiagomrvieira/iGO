<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartProductCollection;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * DISPLAY A LIST OF PRODUCTS IN THE CART
     * *
     * 
     * @OA\Get(path="/api/v1/cart",
     *   tags={"Cart"},
     *   summary="Show products in the cart",
     *   description="Display a list of products added to the cart",
     *   operationId="showCart",
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
     *      description="not found"
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
        return new CartProductCollection( 
            Cart::where('client_id', Auth::user()->client->id)->where('order_id', null)->get()
        );
    }

    /**
     * ADD ITEM TO THE CART
     * *
     * 
     * @OA\Post(path="/api/v1/cart",
     *   tags={"Cart"},
     *   summary="Add item to the cart",
     *   description="Create/Update a product to/in the cart - Expect to recieve a product id and a quantity - If the product is already in the cart, updates the quantity",
     *   operationId="addToCart",
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="product_id", type="integer", example="1"),
     *          @OA\Property(property="quantity", type="integer", example="2"),
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
     *      description="not found"
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cartItem = Cart::updateOrCreate(
            [
                'client_id'  => Auth::user()->client->id,
                'product_id' => $request->product_id,
            ],
            [
                'client_id'  => Auth::user()->client->id,
                'product_id' => $request->product_id,
                'quantity'   => $request->quantity,
            ]
        );

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Produto adicionado ao carrinho',
                                 'data'    => $cartItem], 200); 
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

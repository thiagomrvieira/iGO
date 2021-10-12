<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartProductCollection;
use App\Http\Resources\CartProductResource;
use App\Models\Cart;
use App\Models\CartExtra;
use App\Models\CartSide;
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
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Lista de produtos no carrinho',
                                 'data'    => new CartProductCollection(Cart::where('client_id', Auth::user()->client->id)
                                                                            ->where('order_id', null)->with('CartExtras')->get() )
                                ], 200); 
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
     *          @OA\Property(property="product_id", type="integer", example="4"),
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cartProduct = Cart::updateOrCreate(
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

        if (isset($request->extras)) {
            foreach (json_decode($request->extras) as $extras) {
                CartExtra::updateOrCreate(
                    [
                        'cart_id'  => $cartProduct->id,
                        'extra_id' => $extras->extra_id,
                    ],
                    [
                        'cart_id'  => $cartProduct->id,
                        'extra_id' => $extras->extra_id,
                        'quantity' => $extras->extra_quantity,
                    ]
                );
            }
        }

        if (isset($request->side)) {
            CartSide::updateOrCreate(
                [
                    'cart_id' => $cartProduct->id,
                ],
                [
                    'cart_id'  => $cartProduct->id,
                    'side_id'  => $request->side,
                ]
            );
            
        }
        

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Produto adicionado ao carrinho!',
                                 'data'    => new CartProductResource($cartProduct)], 200); 
    }

    /**
     * REMOVE ITEM FROM THE CART
     * *
     * 
     * @OA\Delete(path="/api/v1/cart/{id}",
     *   tags={"Cart"},
     *   summary="Remove item from the cart",
     *   description="Remove a specified product from the cart - Expect to recieve a valid product id",
     *   operationId="removeFromCart",
     *  @OA\Parameter(
     *      name="id",
     *      description="Product id",
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
    public function destroy($id)
    {
        $cartItem = Cart::where('client_id', Auth::user()->client->id)
                        ->where('product_id', $id)->first();
        if (!$cartItem) {
            $status      = 'Error';
            $message     = 'Produto não encontrado';
            $status_code = 404;
        } else {
            $cartItem->delete();
        }


        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Produto removido do carrinho!'], $status_code ?? 200); 


    }
}

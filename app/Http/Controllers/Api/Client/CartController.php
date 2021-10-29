<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartProductCollection;
use App\Http\Resources\CartProductResource;
use App\Http\Traits\CartTrait;
use App\Http\Traits\OrderTrait;
use App\Models\Cart;
use App\Models\Order;
use App\Models\CartExtra;
use App\Models\CartSauce;
use App\Models\CartSide;
use App\Models\OrderStatusType;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    use CartTrait, OrderTrait;

    /**
     * DISPLAY A LIST OF PRODUCTS IN THE CART
     * *
     * 
     * @OA\Get(path="/api/v1/client/cart",
     *   tags={"Client: Cart"},
     *   summary="Show products in the cart",
     *   description="Display a list of products added to the cart",
     *   operationId="showCart",
     *   
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Lista de produtos no carrinho",
     *              "data": { 
     *                  "products": {
     *                      { 
     *                          "partner": {
     *                              "id": "integer",
     *                              "name": "string"
     *                           },
     *                          "product": {
     *                              "id": "integer",
     *                              "name": "string",
     *                              "price": "float",
     *                              "quantity": "integer"
     *                          },
     *                          "extras": {
     *                              {
     *                              "id": "integer",
     *                              "name": "string",
     *                              "price": "float",
     *                              "quantity": "integer"
     *                              }
     *                          },
     *                          "side": {
     *                              "id": "integer",
     *                              "name": "string"
     *                          },
     *                          "sauce": {
     *                              "id": "integer",
     *                              "name": "string"
     *                          },
     *                          "amount": "float",
     *                          "created_at": "datetime"
     *                      }, 
     *                  },
     *                  "total_products": "integer",
     *                  "total_amount": "float"
     *              },
     *          },
     *      ),
     *      
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
        if (Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', 1 )->count() > 0) {
            $data = new CartProductCollection(Order::where('client_id', Auth::user()->client->id)->where('order_status_type_id', 1 )->first()->cart);
        } else {
            $data = [
                "products"       => [],
                "total_products" => 0,
                "total_amount"   => 0
            ];
        }

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Lista de produtos no carrinho',
                                 'data'    => $data    ?? []
                                ], 200); 
    }

    /**
     * ADD ITEM TO THE CART
     * *
     * 
     * @OA\Post(path="/api/v1/client/cart",
     *   tags={"Client: Cart"},
     *   summary="Add item to the cart",
     *   description="Create/Update a product to/in the cart - Expect to recieve a product id and a quantity - If the product is already in the cart, updates the quantity",
     *   operationId="addToCart",
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="product_id", type="integer", example="4"),
     *          @OA\Property(property="quantity", type="integer", example="2"),
     *          @OA\Property(property="side", type="integer", example="1"),
     *          @OA\Property(property="sauce", type="integer", example="6"),
     *          @OA\Property(property="extras", type="string", example="[{'extra_id':'3','extra_quantity':'1'}]"),
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Lista de produtos no carrinho",
     *              "data": { 
     *                  "products": {
     *                      { 
     *                          "partner": {
     *                              "id": "integer",
     *                              "name": "string"
     *                           },
     *                          "product": {
     *                              "id": "integer",
     *                              "name": "string",
     *                              "price": "float",
     *                              "quantity": "integer"
     *                          },
     *                          "extras": {
     *                              {
     *                              "id": "integer",
     *                              "name": "string",
     *                              "price": "float",
     *                              "quantity": "integer"
     *                              }
     *                          },
     *                          "side": {
     *                              "id": "integer",
     *                              "name": "string"
     *                          },
     *                          "sauce": {
     *                              "id": "integer",
     *                              "name": "string"
     *                          },
     *                          "amount": "float",
     *                          "created_at": "datetime"
     *                      }, 
     *                  },
     *                  "total_products": "integer",
     *                  "total_amount": "float"
     *              },
     *          },
     *      ),
     *      
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

        # Create a new order or get an opened one - OrderTrait
        $order = $this->firstOrCreateOrder($request);     

        # Add Product to a cart or update if exist
        $cartProduct = $this->AddProductToCart($request, $order);

        # Add Extra to a cart or update if exist
        $this->AddExtraToCart($request, $cartProduct);

        # Add Side to a cart or update if exist
        $this->AddSideToCart($request, $cartProduct);

        # Add Sauce to a cart or update if exist
        $this->AddSauceToCart($request, $cartProduct);

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Produto adicionado ao carrinho!',
                                 'data'    => new CartProductResource($cartProduct)], 200); 
    }

    /**
     * REMOVE ITEM FROM THE CART
     * *
     * 
     * @OA\Delete(path="/api/v1/client/cart/{id}",
     *   tags={"Client: Cart"},
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
     *           example= {
     *              "status": "success",
     *              "message": "Produto removido do carrinho!",
     *          },
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
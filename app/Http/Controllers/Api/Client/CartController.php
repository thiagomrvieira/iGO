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
     *      required = true,
     *      description = "The field '<b>options</b>' should be the option that user can choose when ordering a product. <i>Eg.: Sauce or extras in a food type product </i> <br>The first field '<b>id</b>' should be the id of the <b>kind</b> of option. <i>Eg.: sauce or extra</i> <br>The '<b>values</b>' array should be filled with the  <b>option id</b>.",
     *      @OA\JsonContent(
     *           type="object",
     *           @OA\Property(property="product_id", type="integer", example="4"),
     *           @OA\Property(property="quantity", type="integer", example="2"),
     *           @OA\Property(
     *              property="options",
     *              type="array",
     *              example={
     *                  {
     *                      "id": 1,
     *                      "values": {54, 1},
     *                  },
     *                  {
     *                      "id": 2,
     *                      "values": {1},
     *                  },
     *                  {
     *                      "id": 3,
     *                      "values": {3},
     *                  }
     *              },
     *              @OA\Items(
     *                  @OA\Property(
     *                      property="id",
     *                      type="integer",
     *                      example=""
     *                  ),
     *                  @OA\Property(
     *                   property="values",
     *                     type="object",
     *                     example=""
     *                  ),
     *              ),
     *           ),
     *           @OA\Property(property="note", type="string", example="Remove pickles from the sandwich"),
     * 
     *      ),
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

        # Add Product Option to a cart or update if exist
        $this->AddProductOptionToCart($request, $cartProduct);

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Produto adicionado ao carrinho!',
                                 'data'    => new CartProductResource($cartProduct)], 200); 
    }

    /**
     * CHANGE THE QUANTITY OF A SPECIFIED PRODUCT IN THE CART
     * *
     * 
     * @OA\Patch(path="/api/v1/client/cart/{id}",
     *   tags={"Client: Cart"},
     *   summary="Change the quantity of a specified product in the cart",
     *   description="If the quantity < 1, the product will be removed to the cart",
     *   operationId="changeINTheCart",
     *  @OA\Parameter(
     *      name="id",
     *      description="This <b>id </b>represents <i>'cart_product_id'</i> returned in (GET)Cart and (GET)Checkout request ",
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
     *          @OA\Property(property="quantity", type="integer", example="2"),
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Quantidade de itens alterada",
     *           },
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
    public function update(Request $request, $id)
    {

        if ( Cart::where(['client_id'  => Auth::user()->client->id, 'id' => $id,])->update($request->all()) ) {
            $status     = "success";
            $message    = "Produto atualizado"; 
            $statusCode = 200;
        }

        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não foi possível encontrar o produto especificado',
                                ], $statusCode ?? 404); 
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

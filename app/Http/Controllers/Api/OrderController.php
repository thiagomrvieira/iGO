<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * CREATE A NEW ORDER
     * *
     * 
     * @OA\Post(path="/api/v1/orders",
     *   tags={"Orders"},
     *   summary="Create a new order",
     *   description="Create a new order - Expect to recieve a product id and a quantity",
     *   operationId="createorder",
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
        $request['client_id'] = Auth::user()->client->id;

        $order = Order::firstOrCreate(
            array(
                'client_id'            => Auth::user()->client->id,
                'order_status_type_id' => 1,
            ),
            array(
                $request->all()
            ),
        );
        

        return 'teste';
        // $productAndQuantity    = $order->products->pluck('product_id')->toArray() ?? [];
        // $productsIdsForUpdate [] = $request->product_id;

        // $productAndQuantity = array_fill_keys(
        //     $productsIdsForUpdate, 
        //     array('quantity' => $request->quantity,)
        // );

        // foreach ($variable as $key => $value) {
        //     # code...
        // }

        // $order->products()->sync($productAndQuantity);
        $order->products()->sync([
        
                
        ]);

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Produto adicionado ao carrinho',
                                 'data'    => $order], 200); 
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

<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Traits\OrderTrait;
use App\Models\Order;
use App\Models\OrderRating;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductRatingController extends Controller
{
    use OrderTrait;
    
    /**
     * PRODUCT RATING
     * *
     * @OA\Post(path="/api/v1/client/order/{id}/productrating",
     *   tags={"Client: Review & Rating"},
     *   summary="Product rating",
     *   description="Rate a product after the order arrives",
     *   operationId="productRating",
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="product_id", type="integer", example="4"),
     *          @OA\Property(property="rate", type="integer", example="5"),
     *          @OA\Property(property="review", type="string", example="Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Praesent vel viverra nisi."),
     *      )
     *   ),
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        #   Check if the Order with teh specified Id is in Status 8 (delivered)
        if ($order = Order::where(['id' => $id, 'order_status_type_id' => 8])->first() ) {
            
            $data = ProductRating::updateOrCreate([
                'order_id'  => $order->id,
                'client_id' => Auth::user()->client->id,
            ],[
                'order_id'       => $order->id,
                'client_id'      => Auth::user()->client->id,
                'product_id'     => $request->product_id,
                'rate'           => $request->rate,
                'review'         => $request->review,
            ]);

            $message = "Produto avaliado com sucesso!";
        }

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não foi possivel avaliar o pedido especificado',
                                 'data'    => $data    ?? null], 200); 
    }


    
}

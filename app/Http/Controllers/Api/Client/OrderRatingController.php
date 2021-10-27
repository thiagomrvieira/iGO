<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\CheckoutOrderResource;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Http\Traits\OrderTrait;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderRatingController extends Controller
{
    use OrderTrait;
    
    /**
     * ORDER RATING
     * *
     * @OA\Post(path="/api/v1/client/order/{id}/orderrating",
     *   tags={"Client: Review & Rating"},
     *   summary="Order rating",
     *   description="Rate the order when it arrive",
     *   operationId="orderRating",
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="rate", type="integer", example="2"),
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
            
            $data = OrderRating::updateOrCreate([
                'order_id'  => $order->id,
                'client_id' => Auth::user()->client->id,
            ],[
                'order_id'  => $order->id,
                'client_id' => Auth::user()->client->id,
                'rate'      => $request->rate,
            ]);

            $message = "Pedido avaliado com sucesso!";
        }

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não foi possivel avaliar o pedido especificado',
                                 'data'    => $data    ?? null], 200); 
    }

    
}

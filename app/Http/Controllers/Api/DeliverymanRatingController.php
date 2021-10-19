<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\OrderTrait;
use App\Models\DeliverymanRating;
use App\Models\Order;
use App\Models\OrderRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliverymanRatingController extends Controller
{
    use OrderTrait;
    
    /**
     * DELIVERYMAN RATING
     * *
     * @OA\Post(path="/api/v1/client/order/{id}/deliverymanrating",
     *   tags={"Review & Rating"},
     *   summary="Delivery man rating",
     *   description="Rate the delivery man when he deliver the order",
     *   operationId="deliverymanRating",
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="rate", type="integer", example="4"),
     *          @OA\Property(property="review", type="string", example="Mauris aliquet nunc non turpis scelerisque, eget. Diuretics paradis num copo é motivis de denguis. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose."),
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
            #   Get the deliveryman 
            $deliverymanOrder = $order->deliverymen->where('order_delivery_status_type_id', 3)->first();
            
            $data = DeliverymanRating::updateOrCreate([
                'order_id'  => $order->id,
                'client_id' => Auth::user()->client->id,
            ],[
                'order_id'       => $order->id,
                'client_id'      => Auth::user()->client->id,
                'deliveryman_id' => $deliverymanOrder->deliveryman_id,
                'rate'           => $request->rate,
                'review'         => $request->review,
            ]);

            $message = "Estafeta avaliado com sucesso!";
        }

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não foi possivel avaliar o estafeta no pedido especificado',
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

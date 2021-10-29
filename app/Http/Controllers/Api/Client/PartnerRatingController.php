<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Traits\OrderTrait;
use App\Models\Order;
use App\Models\OrderRating;
use App\Models\PartnerRating;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerRatingController extends Controller
{
    use OrderTrait;
    
    /**
     * Partner RATING
     * *
     * @OA\Post(path="/api/v1/client/order/{id}/partnerrating",
     *   tags={"Client: Review & Rating"},
     *   summary="Partner rating",
     *   description="Rate a partner after the order arrives",
     *   operationId="partnerRating",
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="rate", type="integer", example="5"),
     *          @OA\Property(property="review", type="string", example="Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Praesent vel viverra nisi."),
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Aderente avaliado com sucesso!",
     *              "data": {
     *                  "order_id": "integer",
     *                  "client_id": "integer",
     *                  "rate": "integer",
     *                  "review": "string",
     *                  "updated_at": "datetime",
     *                  "created_at": "datetime",
     *                  "id": "integer"
     *              },
     *           },
     *      ),
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
            
            $data = PartnerRating::updateOrCreate([
                'order_id'  => $order->id,
                'client_id' => Auth::user()->client->id,
            ],[
                'order_id'       => $order->id,
                'client_id'      => Auth::user()->client->id,
                'partner_id'     => $order->partner_id,
                'rate'           => $request->rate,
                'review'         => $request->review,
            ]);

            $status     = "success";
            $message    = "Aderente avaliado com sucesso!";
            $statusCode = 200;
        }

        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não foi possivel avaliar o aderente especificado',
                                 'data'    => $data    ?? null],  $statusCode ?? 404); 
    }


    
}

<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewCollection;
use App\Http\Resources\ReviewResource;
use App\Models\PartnerRating;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerRatingController extends Controller
{
    /**
     * GET PARTNER REVIEWS
     * *
     * 
     * @OA\Get(path="/api/v1/partner/reviews",
     *   tags={"Partner: Review & Rating"},
     *   summary="Get partner reviews",
     *   description="",
     *   operationId="getPartnerReviews",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Dados pessoais",
     *              "data": {
     *                  "partner": "string",
     *                  "category_icon": "string",
     *                  "total_reviews": "integer",
     *                  "reviews": {
     *                      {
     *                          "id": "integer",
     *                          "client_name": "string",
     *                          "client_image": "string",
     *                          "review": "string",
     *                          "rating": "integer",
     *                          "date": "datetime"
     *                       },
     *                  }
     *              },
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
     */
    public function index()
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Reviews do aderente',
                                 'data'    => new ReviewCollection( PartnerRating::where('partner_id', Auth::user()->partner->id)
                                                                        ->orderBy('created_at', 'desc')->get()  )], 200); 

    }
}

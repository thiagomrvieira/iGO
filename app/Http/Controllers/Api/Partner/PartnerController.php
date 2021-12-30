<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerPersonalDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    /**
     * GET CLIENT PROFILE
     * *
     * 
     * @OA\Get(path="/api/v1/partner/profile",
     *   tags={"Partner: Partner data"},
     *   summary="Get partner profile",
     *   description="Get data from logged in Partner",
     *   operationId="getPartnerProfile",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Dados pessoais",
     *              "data": {
     *                  "company_name": "String",
     *                  "responsible_name": "String",
     *                  "email": "String",
     *                  "phone_number": "String",
     *                  "email": "String",
     *                  "mobile_phone_number": "String",
     *                  "images": {
     *                      "image_cover": "String",
     *                      "image_01": "String",
     *                      "image_02": "String",
     *                      "image_03": "String",
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
    public function getPartnerData()
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Dados pessoais',
                                 'data'    => new PartnerPersonalDataResource( Auth::user()->partner )], 200); 
    }
}

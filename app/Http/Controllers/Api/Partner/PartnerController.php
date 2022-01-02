<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerContactsResource;
use App\Http\Resources\PartnerPersonalDataResource;
use App\Http\Traits\ImagesTrait;
use App\Http\Traits\PartnerTrait;
use App\Http\Traits\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    use UserTrait, ImagesTrait, PartnerTrait;

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

    /**
     * UPDATE PARTNER PROFILE
     * *
     * 
     * @OA\Patch(path="/api/v1/partner/profile",
     *   tags={"Partner: Partner data"},
     *   summary="Change client password",
     *   description="Update client password",
     *   operationId="setClientProfile",
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="company_name", type="string", example="Dolor sit ame"),
     *          @OA\Property(property="responsible_name", type="string", example="Mussum Ipsum"),
     *          @OA\Property(property="email", type="string", example="mussum@igo.pt"),
     *          @OA\Property(property="phone_number", type="integer", example="312 978 645"),
     *          @OA\Property(property="mobile_phone_number", type="integer", example="978 645 312"),
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Dados atualizados",
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
     *   @OA\Response(
     *      response=422,
     *      description="Validation error",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          example= {
     *              "message": "The given data was invalid.",
     *              "errors": {
     *                  "name" : {
     *                      {
     *                          "string",
     *                      },
     *                  },
     *                  "email" : {
     *                      {
     *                          "string",
     *                      },
     *                  },
     *                  "mobile_phone_number" : {
     *                     {
     *                          "string",
     *                      },
     *                  },
     *                  "line_1" : {
     *                      {
     *                          "string",
     *                      },
     *                  },
     *                      
     *              },
     *          },
     *      )
     *  ),
     *   security={
     *     {"api_key": {}}
     *   }
     * )
     *
     */
    public function updatePartnerData(Request $request)
    {

        $validated = $request->validate([
            'email' => 'email|unique:users',
        ]);

        #   Update User data
        $user = $this->updateUserFromApi($request);

        #   Update Partner
        $partner = $this->updatePartner($request);

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Dados atualizados',
                                 'data'    => new PartnerPersonalDataResource( Auth::user()->partner )], 200); 
        
    }

    /**
     * GET CLIENT CONTACTS
     * *
     * 
     * @OA\Get(path="/api/v1/partner/contacts",
     *   tags={"Partner: Partner data"},
     *   summary="Get partner contacts",
     *   description="Get contacts from logged Partner",
     *   operationId="getPartnerContacts",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Dados pessoais",
     *              "data": {
     *                  "email": "String",
     *                  "phone_number": "String",
     *                  "mobile_phone_number": "String",
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
    public function getPartnerContacts()
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Contatos do Aderente',
                                 'data'    => new PartnerContactsResource( Auth::user()->partner )], 200); 
    }
}

<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Resources\ClientAddressCollection;
use App\Http\Resources\ClientPersonalDataResource;
use App\Http\Resources\ClientResource;
use App\Http\Traits\AddressTrait;
use App\Http\Traits\ClientTrait;
use App\Http\Traits\ImagesTrait;
use App\Http\Traits\UserTrait;
use App\Models\Address;
use App\Models\Client;
use App\Models\Partner;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    use AddressTrait, UserTrait, ClientTrait, ImagesTrait;

    /**
     * GET CLIENT PROFILE
     * *
     * 
     * @OA\Get(path="/api/v1/client/profile",
     *   tags={"Client: Profile, Password & Favorite partners"},
     *   summary="Get client profile",
     *   description="Get data from logged in client",
     *   operationId="getClientProfile",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Dados pessoais",
     *              "data": {
     *                  "id": "Integer",
     *                  "name": "String",
     *                  "birth_date": "Datetime",
     *                  "email": "String",
     *                  "mobile_phone_number": "String",
     *                  "profile_image": "String"
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
    public function getPersonalData()
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Dados pessoais',
                                 'data'    => new ClientPersonalDataResource(Auth::user()->client)], 200); 
    }

    /**
     * UPDATE CLIENT PROFILE
     * *
     * 
     * @OA\Patch(path="/api/v1/client/profile",
     *   tags={"Client: Profile, Password & Favorite partners"},
     *   summary="Change client password",
     *   description="Update client password",
     *   operationId="setClientProfile",
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="name", type="string", example="Mussum Ipsum"),
     *          @OA\Property(property="birth_date", type="string", example="1988-07-09"),
     *          @OA\Property(property="email", type="string", example="mussum@igo.pt"),
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
     *                  "id": "Integer",
     *                  "name": "String",
     *                  "birth_date": "Datetime",
     *                  "email": "String",
     *                  "mobile_phone_number": "String",
     *                  "profile_image": "String"
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
    public function updatePersonalData(Request $request)
    {

        $validated = $request->validate([
            'email' => 'email|unique:users',
        ]);

        // # Update User data
        $user = $this->updateUserFromApi($request);

        // # Update Client
        $client = $this->updateClient($request);

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Dados atualizados',
                                 'data'    => new ClientPersonalDataResource(Auth::user()->client)], 200); 
        
    }

    /**
     * Favorite/Unfavorite a partner - Persist in client_partner pivot table
     * *
     * 
     * @OA\Post(path="/api/v1/client/favorite/{id}",
     *   tags={"Client: Profile, Password & Favorite partners"},
     *   summary="Set favorite partners",
     *   description="Set/Unset a partner as favorite - Expect to receive a valid partner id",
     *   operationId="setFavoritePartners",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Aderente favoritado",
     *           },
     *      ),
     *   ),
     *   @OA\Parameter(
     *      name="id",
     *      description="Partner id",
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
     * @param  Partner $partner
     * @return Response
     */
    public function favoritePartner(Partner $partner)
    {
        $isFavorite = Auth::user()->client->favorites()
                                          ->where('partner_id', $partner->id)->exists();        

        if (!$isFavorite) {
            Auth::user()->client->favorites()->attach($partner->id);
            $message = 'Aderente favoritado';
        } else {
            Auth::user()->client->favorites()->detach($partner->id);
        }

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Aderente desfavoritado'], 200);
    }




    /**
     * UPDATE CLIENT PASSWORD
     * *
     * 
     * @OA\Patch(path="/api/v1/client/password",
     *   tags={"Client: Profile, Password & Favorite partners"},
     *   summary="Update client password",
     *   description="Update client password",
     *   operationId="updatePassWord",
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="current_password", type="string", example="iGO@123"),
     *          @OA\Property(property="new_password", type="string", example="iGOdelivery"),
     *          @OA\Property(property="confirm_new_password", type="string", example="iGOdelivery"),
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Password alterado!",
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
     *                  "current_password" : {
     *                      {
     *                          "string",
     *                      },
     *                  },
     *                  "new_password" : {
     *                      {
     *                          "string",
     *                      },
     *                  },
     *                  "confirm_new_password" : {
     *                     {
     *                          "string",
     *                      },
     *                  },
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
    public function updatePassWord(UpdateUserPasswordRequest $request)
    {
        $this->updateUserPassWord($request);

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? "Password alterado!"], 200); 
        
    }


    /**
     * UPDATE CLIENT PROFILE IMAGE
     * *
     * 
     * @OA\Post(path="/api/v1/client/image",
     *   tags={"Client: Profile, Password & Favorite partners"},
     *   summary="Update client profile image",
     *   description="Update profile image",
     *   operationId="updateImage",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 allOf={
     *                     @OA\Schema(ref="#components/schemas/item"),
     *                     @OA\Schema(
     *                         @OA\Property(
     *                             property="image",
     *                             type="string", format="binary"
     *                         )
     *                     )
     *                 }
     *             )
     *         )
     *     ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Imagem alterada!",
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
     *          
     *      )
     *  ),
     *   security={
     *     {"api_key": {}}
     *   }
     * )
     *
     */
    public function updateImage(Request $request)
    {
        // Store Images 
        $this->UpateClientImage($request);   

        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? "Imagem alterada!"], 200); 
        
    }
}

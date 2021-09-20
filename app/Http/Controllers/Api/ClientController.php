<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientAddressCollection;
use App\Http\Resources\ClientPersonalDataResource;
use App\Http\Resources\ClientResource;
use App\Models\Address;
use App\Models\Client;
use App\Models\Partner;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    /**
     * Get client profile
     * *
     * 
     * @OA\Get(path="/api/v1/profile",
     *   tags={"Clients"},
     *   summary="Get client profile",
     *   description="Get data from logged in client",
     *   operationId="getClientProfile",
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
     */
    public function getPersonalData()
    {
        return new ClientPersonalDataResource(Auth::user()->client);
    }

    /**
     * Set client profile
     * *
     * 
     * @OA\Patch(path="/api/v1/profile",
     *   tags={"Clients"},
     *   summary="Set client profile",
     *   description="Update data from logged in client",
     *   operationId="setClientProfile",
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="email", type="string", example="mussum@igo.pt"),
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
     */
    public function setPersonalData(Request $request)
    {
        return Auth::user()->client->update($request->all());
        
    }

    /**
     * Get client addresses
     * *
     * 
     * @OA\Get(path="/api/v1/address",
     *   tags={"Clients"},
     *   summary="Get client addresses",
     *   description="Get data from logged in client",
     *   operationId="getClientAddresses",
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
     */
    public function getAddressData()
    {
        return new ClientAddressCollection( 
            Address::where('user_id', Auth::user()->id)->get() 
        );
    }

    /**
     * Favorite/Unfavorite a partner - Persist in client_partner pivot table
     * *
     * 
     * @OA\Post(path="/api/v1/favorite/{id}",
     *   tags={"Clients"},
     *   summary="Set favorite partners",
     *   description="Set/Unset a partner as favorite - Expect to receive a valid partner id",
     *   operationId="setFavoritePartners",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
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

    
}
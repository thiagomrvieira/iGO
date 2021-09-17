<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Partner;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
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

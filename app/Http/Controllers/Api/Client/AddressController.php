<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientAddressCollection;
use App\Http\Traits\AddressTrait;
use App\Http\Traits\ClientTrait;
use App\Http\Traits\UserTrait;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    use AddressTrait, UserTrait, ClientTrait;

    /**
     * GET CLIENT ADRESSES
     * *
     * 
     * @OA\Get(path="/api/v1/client/addresses",
     *   tags={"Client: Address"},
     *   summary="Get client addresses",
     *   description="Get list of all addresses from logged in client",
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
                                 'message' => $message ?? 'Endereços',
                                 'data'    => new ClientAddressCollection(Address::where('user_id', Auth::user()->id)->get())], 200); 
    }

    /**
     * UPDATE ADDRESS DATA
     * *
     * 
     * @OA\Post(path="/api/v1/client/addresses",
     *   tags={"Client: Address"},
     *   summary="Save client address",
     *   description="Create new client address - Update client address if address_id not null ",
     *   operationId="updateAddressData",
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="address_id", type="integer", example="1"),
     *          @OA\Property(property="address_type_id", type="integer", example="2"),
     *          @OA\Property(property="address_name", type="string", example="Trabalho"),
     *          @OA\Property(property="line_1", type="string", example="Address line 1. Eg: Av. Mauris nec dolor, nº 50"),
     *          @OA\Property(property="line_2", type="string", example="Address line 2. Eg: Praceta São João"),
     *          @OA\Property(property="county_id", type="integer", example="1"),
     *          @OA\Property(property="locality", type="string", example="Bairro"),
     *          @OA\Property(property="post_code", type="string", example="46703"),
     *          @OA\Property(property="country", type="string", example="Angola"),
     * 
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
    public function update(Request $request)
    {
        # Create Address
        $address = $this->createorUpdateAddressFromApi($request); 

        return $this->index();
        
    }
    
    /**
     * DELETE ADDRESS
     * *
     * 
     * @OA\Delete(path="/api/v1/client/addresses/{id}",
     *   tags={"Client: Address"},
     *   summary="Remove address",
     *   description="Remove client address specified in addres id",
     *   operationId="removeClienteAddress",
     *   @OA\Parameter(
     *      name="id",
     *      description="Address id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
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
    public function destroy($id)
    {
        if ( Address::where('user_id', Auth::user()->id)->where('id', $id)->delete() ){
            $message = 'Endereço removido';
        }
            
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não foi possível remover o endereço informado'], 200); 
        
    }
}

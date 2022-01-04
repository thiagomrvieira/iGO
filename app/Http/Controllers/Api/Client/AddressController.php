<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientAddressCollection;
use App\Http\Traits\AddressTrait;
use App\Http\Traits\ClientTrait;
use App\Http\Traits\UserTrait;
use App\Models\Address;
use App\Models\AddressType;
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
     *   description= "Return all addresses related to the user",
     *   operationId="getClientAddresses",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Endereços",
     *              "data": { 
     *                  "addresses": {
     *                      { 
     *                          "id": "integer",
     *                          "address_name": "string",
     *                          "address_type": "string",
     *                          "address_line_1": "string",
     *                          "address_line_2": "string",
     *                          "county": {
     *                              "id": "integer",
     *                              "name": "string"
     *                          },
     *                          "locality": "string",
     *                          "post_code": "string",
     *                          "country": "string",
     *                          "tax_name": "string",
     *                          "tax_number": "string"
     *                      }, 
     *                  },
     *              },
     *          },
     *      ),
     *      
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
        $addresses  = Address::where('user_id', Auth::user()->id)->where('active', true)->get();

        if ($addresses != null && $addresses->count() > 0) {
            $data       = new ClientAddressCollection( $addresses );
            $status     = "success";
            $message    = "Endereços"; 
            $statusCode = 200;
        }
    
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não há endereços cadastados',
                                 'data'    => $data    ?? [] ], $statusCode ?? 404); 
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
     *          example={
     *              {
     *                  "address_id": 1, 
     *                  "address_type_id": 2, 
     *                  "address_name": "Trabalho", 
     *                  "line_1": "Address line 1. Eg: Av. Mauris nec dolor, nº 50", 
     *                  "line_2": "Address line 2. Eg: Praceta São João", 
     *                  "county_id": 1, 
     *                  "locality": "Bairro", 
     *                  "post_code": "46703", 
     *                  "country": "Angola", 
     *                  "tax_name": "Mussum",
     *                  "tax_number": 987654321
     *              }
     *          }
     *          
     *          
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Endereços",
     *              "data": { 
     *                  "addresses": {
     *                      { 
     *                          "id": "integer",
     *                          "address_name": "string",
     *                          "address_type": "string",
     *                          "address_line_1": "string",
     *                          "address_line_2": "string",
     *                          "county": {
     *                              "id": "integer",
     *                              "name": "string"
     *                          },
     *                          "locality": "string",
     *                          "post_code": "string",
     *                          "country": "string",
     *                          "tax_name": "string",
     *                          "tax_number": "string"
     *                      }, 
     *                  },
     *              },
     *          },
     *      ),
     *      
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
     *      description="Unprocessable Entity"
     *   ),
     *   security={
     *     {"api_key": {}}
     *   }
     * )
     *
     */
    public function update(Request $request)
    {
        
        #   Validate if the Address type id is a valid one
        foreach ($request->all() as $addressData) {
            if (!in_array($addressData['address_type_id'], AddressType::pluck('id')->all() )) {
                
                return response()->json([
                    "message" => "The given data was invalid.",
                    "errors"  => [
                        "body" => [
                            "É obrigatória a indicação de um id válido para o campo address_type_id."
                        ]
                    ]
                ], 422); 
                
            }
        }

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
     *           example= {
     *              "status": "success",
     *              "message": "Endereço removido",
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
    public function destroy($id)
    {
        if ( Address::where('user_id', Auth::user()->id)->where('id', $id)->update(['active' => false]) ){
            $message = 'Endereço removido';
        }
            
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Não foi possível remover o endereço informado'], 200); 
        
    }
}

<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;
use App\Http\Traits\CartTrait;
use App\Http\Traits\OrderTrait;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvinceController extends Controller
{
    use CartTrait, OrderTrait;

    /**
     * DISPLAY A LIST OF ALL PROVINCES
     * *
     * 
     * @OA\Get(path="/api/v1/provinces",
     *   tags={"General: Provinces"},
     *   summary="Show provinces",
     *   description="Display a list of all provinces",
     *   operationId="showProvinces",
     *   
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Province list",
     *              "data": {
     *                  {
     *                      "id": "integer",
     *                      "name": "string",
     *                      "country": "string",
     *                  }
     *              }
     *           },
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
     *
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'  => $status       ?? 'success',
                                 'message' => $message      ?? 'province list',
                                 'data'    => ProvinceResource::collection( Province::all() )
                                ], 200); 
    }


    /**
     * Display a specified province data
     **
     * @OA\Get(path="/api/v1/provinces/{id}",
     *   tags={"General: Provinces"},
     *   summary="Get a specified province",
     *   description="Get the details of a specified province",
     *   operationId="getProvince",
     *   @OA\Parameter(
     *      name="id",
     *      description="province id",
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
     *              "message": "province data",
     *              "data": {
     *                  "id": "integer",
     *                  "name": "string",
     *                  "country": "string",
     *              }
     *           },
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
     *
     * )
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'province data',
                                 'data'    => new ProvinceResource( Province::find($id) ) 
                                ], 200); 
    }
}

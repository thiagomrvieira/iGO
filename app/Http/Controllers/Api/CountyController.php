<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartProductCollection;
use App\Http\Resources\CartProductResource;
use App\Http\Traits\CartTrait;
use App\Http\Traits\OrderTrait;
use App\Models\Cart;
use App\Models\Order;
use App\Models\CartExtra;
use App\Models\CartSauce;
use App\Models\CartSide;
use App\Models\County;
use App\Models\OrderStatusType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountyController extends Controller
{
    use CartTrait, OrderTrait;

    /**
     * DISPLAY A LIST OF ALL COUNTIES
     * *
     * 
     * @OA\Get(path="/api/v1/counties",
     *   tags={"Counties"},
     *   summary="Show counties",
     *   description="Display a list of all conties",
     *   operationId="showConties",
     *   
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "County list",
     *              "data": {
     *                  {
     *                      "id": "integer",
     *                      "name": "string",
     *                      "country": "string",
     *                      "created_at": "datetime",
     *                      "updated_at": "datetime",
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
     *   security={
     *     {"api_key": {}}
     *   }
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'  => $status       ?? 'success',
                                 'message' => $message      ?? 'County list',
                                 'data'    => County::all() ?? []
                                ], 200); 
    }


    /**
     * Display a specified county data
     **
     * @OA\Get(path="/api/v1/counties/{id}",
     *   tags={"Counties"},
     *   summary="Get a specified county",
     *   description="Get the details of a specified county",
     *   operationId="getACounty",
     *   @OA\Parameter(
     *      name="id",
     *      description="County id",
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
     *              "message": "County list",
     *              "data": {
     *                  "id": "integer",
     *                  "name": "string",
     *                  "country": "string",
     *                  "created_at": "datetime",
     *                  "updated_at": "datetime",
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
     *   security={
     *     {"api_key": {}}
     *   }
     * )
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Dados do produto',
                                 'data'    => County::where('id', $id)->first() ], 200); 
    }
}

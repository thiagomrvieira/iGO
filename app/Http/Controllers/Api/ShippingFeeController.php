<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShippingFeeCollection;
use App\Models\ShippingFee;
use Illuminate\Http\Request;

class ShippingFeeController extends Controller
{

    /**
     * Display a listing of the resource.
     **
     *
     * @OA\Get(path="/api/v1/shippingfees",
     *   tags={"Shipping fees"},
     *   summary="Get all shipping fees",
     *   description="Display a list of all shipping fees",
     *   operationId="getShippingFees",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
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
     *      {"api_key": {}}
     *   }
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ShippingFeeCollection( 
            ShippingFee::all()
        );
    }


    /**
     * Display the resource specified by ID.
     **
     *
     * @OA\Get(path="/api/v1/shippingfees/{id}",
     *   tags={"Shipping fees"},
     *   summary="Get the especified shipping fee",
     *   description="Display the resource specified by ID.",
     *   operationId="getShippingFeeById",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="id",
     *      description="Shipping fee id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
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
     *      {"api_key": {}}
     *   }
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ShippingFeeCollection( 
            ShippingFee::where('id', $id)->get()
        );
    }


    /**
     * Display the resource specified by From/To columns.
     **
     *
     * @OA\Get(path="/api/v1/shippingfees/{from}/{to}",
     *   tags={"Shipping fees"},
     *   summary="Get the especified shipping fee",
     *   description="Display the resource specified by FROM(delivery_from) TO(delivery_to) paramters.",
     *   operationId="getShippingFeebyFromTo",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="from",
     *      description="County id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="to",
     *      description="County id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
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
     *      {"api_key": {}}
     *   }
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByFromTo($from, $to)
    {
        return new ShippingFeeCollection( 
            ShippingFee::where('delivery_from', $from)->where('delivery_to', $to)->get()
        );
    }
    
}

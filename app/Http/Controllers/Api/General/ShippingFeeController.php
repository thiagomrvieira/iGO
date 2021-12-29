<?php

namespace App\Http\Controllers\Api\General;

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
     *   tags={"General: Shipping fees"},
     *   summary="Get all shipping fees",
     *   description="Display a list of all shipping fees",
     *   operationId="getShippingFees",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Lista de taxas de entrega",
     *              "data": {
     *                 "shipping_fees": {
     *                      {
     *                          "id": "integer",
     *                          "delivery_from_id": "integer",
     *                          "delivery_from_name": "string",
     *                          "delivery_to_id": "integer",
     *                          "delivery_to_name": "string",
     *                          "price": "float",
     *                      }, 
     *                  }
     *              }
     *           },
     *      ),
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
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Lista de taxas de entrega',
                                 'data'    => new ShippingFeeCollection( ShippingFee::all() )], 200); 
    }


    /**
     * Display the resource specified by ID.
     **
     *
     * @OA\Get(path="/api/v1/shippingfees/{id}",
     *   tags={"General: Shipping fees"},
     *   summary="Get the especified shipping fee",
     *   description="Display the resource specified by ID.",
     *   operationId="getShippingFeeById",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Taxas de entrega",
     *              "data": {
     *                 "shipping_fees": {
     *                      {
     *                          "id": "integer",
     *                          "delivery_from_id": "integer",
     *                          "delivery_from_name": "string",
     *                          "delivery_to_id": "integer",
     *                          "delivery_to_name": "string",
     *                          "price": "float",
     *                      }, 
     *                  }
     *              }
     *           },
     *      ),
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
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Taxas de entrega',
                                 'data'    => new ShippingFeeCollection( ShippingFee::where('id', $id)->get() )], 200); 
    }


    /**
     * Display the resource specified by From/To columns.
     **
     *
     * @OA\Get(path="/api/v1/shippingfees/{from}/{to}",
     *   tags={"General: Shipping fees"},
     *   summary="Get the especified shipping fee",
     *   description="Display the resource specified by FROM(delivery_from) TO(delivery_to) paramters.",
     *   operationId="getShippingFeebyFromTo",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Taxas de entrega",
     *              "data": {
     *                 "shipping_fees": {
     *                      {
     *                          "id": "integer",
     *                          "delivery_from_id": "integer",
     *                          "delivery_from_name": "string",
     *                          "delivery_to_id": "integer",
     *                          "delivery_to_name": "string",
     *                          "price": "float",
     *                      }, 
     *                  }
     *              }
     *           },
     *      ),
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
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByFromTo($from, $to)
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Taxas de entrega',
                                 'data'    => new ShippingFeeCollection( ShippingFee::where('delivery_from', $from)->where('delivery_to', $to)->get() )], 200); 
    }
    
}

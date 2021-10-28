<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductDetailResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a list of all products
     **
     * @OA\Get(path="/api/v1/client/products",
     *   tags={"Client: Products"},
     *   summary="Get all products",
     *   description="Get the list of all products",
     *   operationId="getAllProducts",
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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Lista de produtos do aderente',
                                 'data'    => new ProductCollection( Product::all() )], 200); 
    }



    /**
     * Display a specified product data
     **
     * @OA\Get(path="/api/v1/client/products/{id}",
     *   tags={"Client: Products"},
     *   summary="Get a specified product",
     *   description="Get the details of a specified product",
     *   operationId="getAProduct",
     *   @OA\Parameter(
     *      name="id",
     *      description="Product id",
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Dados do produto',
                                 'data'    => new ProductDetailResource( Product::where('id', $id)->first() )], 200); 
    }


}

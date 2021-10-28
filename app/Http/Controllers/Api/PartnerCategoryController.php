<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerCategoryCollection;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;

class PartnerCategoryController extends Controller
{
    /**
     * Return a list of all active partners categories
     * *
     * @OA\Get(path="/api/v1/client/categories",
     *   tags={"Client: Partner Categories"},
     *   summary="Get the list of categories",
     *   description="Return a list of all active partners categories",
     *   operationId="getListOfCategories",
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
                                 'message' => $message ?? 'Todas as categorias',
                                 'data'    => new PartnerCategoryCollection(PartnerCategory::where('active', true)->get())], 200); 
    }




    /**
     * Return data of the specified partners category
     * *
     * @OA\Get(path="/api/v1/client/categories/{id}",
     *   tags={"Client: Partner Categories"},
     *   summary="Get partner category information",
     *   description="Return data of the specified partners category",
     *   operationId="getPartnerCategoryData",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="id",
     *      description="Partner Category id",
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Dados da categoria',
                                 'data'    => new PartnerCategoryCollection(PartnerCategory::where('id', $id)->get())], 200);  
    }

    /**
     * Return a list of all active main partner categories
     * *
     * @OA\Get(path="/api/v1/client/maincategories",
     *   tags={"Client: Partner Categories"},
     *   summary="Get the list of main categories",
     *   description="Return a list of all active main partner categories",
     *   operationId="getListOfMainCategories",
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
    public function showMain()
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Categorias Principais',
                                 'data'    => new PartnerCategoryCollection(PartnerCategory::where('parent_id', null)->where('active', true)->get())], 200); 
    }

    /**
     * Return a list of all active sub partner categories
     * *
     * @OA\Get(path="/api/v1/client/subcategories",
     *   tags={"Client: Partner Categories"},
     *   summary="Get the list of sub categories",
     *   description="Return a list of all active sub partner categories",
     *   operationId="getListOfSubCategories",
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
    public function showSub()
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Sub Categorias',
                                 'data'    => new PartnerCategoryCollection(PartnerCategory::where('parent_id', '!=' ,null)->where('active', true)->get())], 200); 
    }
   
}

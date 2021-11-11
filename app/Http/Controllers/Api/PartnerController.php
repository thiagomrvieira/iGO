<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerCollection;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ReviewCollection;
use App\Models\Partner;
use App\Models\PartnerRating;
use App\Models\Product;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * @OA\Get(path="/api/v1/client/partners",
     *   tags={"Client: Partners"},
     *   summary="Get the list of partners",
     *   description="Return a list of all active partners",
     *   operationId="getListOfPartners",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Lista de aderentes",
     *              "data": {
     *                  "partners": {
     *                      {
     *                          "id": "integer",
     *                          "company_name": "string",
     *                          "responsible_name": "string",
     *                          "phone_number": "string",
     *                          "mobile_phone_number": "string",
     *                          "tax_number": "string",
     *                          "category": "string",
     *                          "sub_categories": {
     *                              {
     *                                  
     *                              },
     *                          },
     *                          "average_order_time": "string",
     *                          "premium": "boolean",
     *                          "account_created_at": "datetime",
     *                          "account_approved_at": "datetime",
     *                          "images": {
     *                              "id": "integer",
     *                              "partner_id": "integer",
     *                              "image_cover": "string",
     *                              "image_01": "string",
     *                              "image_02": "string",
     *                              "image_03": "string",
     *                              "created_at": "datetime",
     *                              "updated_at": "datetime",
     *                          },
     *                          "total_products": "integer",
     *                          "total_reviews": "integer",
     *                          "rating": "integer",
     *                      }
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
     */
    /**
     * Display a listing of the Partner resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Lista de aderentes',
                                 'data'    => new PartnerCollection( Partner::where('active', true)->with('images')->get() )], 200); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * @OA\Get(path="/api/v1/client/partners/{id}",
     *   tags={"Client: Partners"},
     *   summary="Get partner information",
     *   description="Expect to receive a valid ID and return partner and his products data",
     *   operationId="getPartnerData",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Lista de aderentes",
     *              "data": {
     *                  "partners": {
     *                      {
     *                          "id": "integer",
     *                          "company_name": "string",
     *                          "responsible_name": "string",
     *                          "phone_number": "string",
     *                          "mobile_phone_number": "string",
     *                          "tax_number": "string",
     *                          "category": "string",
     *                          "sub_categories": {
     *                              {
     *                                  
     *                              },
     *                          },
     *                          "average_order_time": "string",
     *                          "premium": "boolean",
     *                          "account_created_at": "datetime",
     *                          "account_approved_at": "datetime",
     *                          "images": {
     *                              "id": "integer",
     *                              "partner_id": "integer",
     *                              "image_cover": "string",
     *                              "image_01": "string",
     *                              "image_02": "string",
     *                              "image_03": "string",
     *                              "created_at": "datetime",
     *                              "updated_at": "datetime",
     *                          },
     *                          "total_products": "integer",
     *                          "total_reviews": "integer",
     *                          "rating": "integer",
     *                      }
     *                  }
     *              }
     *           },
     *      ),
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
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Lista de aderentes',
                                 'data'    => new PartnerCollection( Partner::where('id', $id)->with('images', 'products')->get() )], 200); 
    }

    /**
     * @OA\Get(path="/api/v1/client/partners/{id}/products",
     *   tags={"Client: Partners"},
     *   summary="Get partner products",
     *   description="Expect to receive a valid ID and return partner products data",
     *   operationId="getPartnerProducts",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Lista de aderentes",
     *              "data": {
     *                 "products": {
     *                      {
     *                          "id": "integer",
     *                          "name": "string",
     *                          "description": "string",
     *                          "category": {
     *                              "id": "integer",
     *                              "name": "string"
     *                          },
     *                          "image": "string",
     *                          "price": "float",
     *                          "final_price": "float",
     *                          "note": "string",
     *                          "campaign": {
     *                              "id": "integer",
     *                              "name": "string"
     *                          },
     *                          "created_at": "datetime",
     *                          "available": "boolean"
     *                      }, 
     *                  }
     *              }
     *           },
     *      ),
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
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProducts($id)
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Lista de produtos do aderente',
                                 'data'    => new ProductCollection( Product::where('partner_id', $id)->where('available', 1)->get() )], 200); 
    }

    /**
     * @OA\Get(path="/api/v1/client/partners/{id}/reviews",
     *   tags={"Client: Partners"},
     *   summary="Get partner reviews",
     *   description="Expect to receive a valid ID and return partner reviews data",
     *   operationId="getPartnerReviews",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Reviews do aderente",
     *              "data": {
     *                  "partner": "string",
     *                   "category_icon": "string",
     *                   "total_reviews": "integer",
     *                   "reviews": {
     *                      {
     *                          "id": "integer",
     *                          "client_name": "string",
     *                          "client_image": "string",
     *                          "review": "string",
     *                          "rating": "integer",
     *                          "date": "datetime"
     *                       },
     *                  }
     *              }
     *           },
     *      ),
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showReviews($id)
    {
        $review = PartnerRating::where('partner_id', $id)->get();

        if ($review->count() > 0) {
            $data       = new ReviewCollection( $review );
            $status     = "success";
            $message    = "Reviews do aderente"; 
            $statusCode = 200;
        }

        return response()->json(['status'  => $status  ?? 'not found',
                                 'message' => $message ?? 'Não há reviews para o aderente',
                                 'data'    => $data    ?? null 
                                ], $statusCode ?? 404); 

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WebContentResource;
use App\Models\WebContent;
use Illuminate\Http\Request;

class FrontOfficeController extends Controller
{
        /**
     * @OA\Get(path="/api/v1/content/{content}",
     *   tags={"Webcontent"},
     *   summary="Get web content",
     *   description="Expect to receive a valid content area key (Options: 'about', 'faq', 'conditions', 'contacts') and return the respective content",
     *   operationId="getWebContent",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="content",
     *      description="Options: 'about', 'faq', 'conditions', 'contacts'",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="string"
     *      )
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
     *   
     * )
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showContent($content)
    {
        return new WebContentResource( 
            WebContent::where('content_area', $content)->first()
        );
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WebContentCollection;
use App\Http\Resources\WebContentResource;
use App\Models\WebContent;
use Illuminate\Http\Request;

class FrontOfficeController extends Controller
{
    /**
     * Display All Web contents.
     **
     *
     * @OA\Get(path="/api/v1/contents",
     *   tags={"Webcontent"},
     *   summary="Get all active web contents",
     *   description="Display all active web contents",
     *   operationId="getAllWebContent",
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
     *      description="not found"
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   ),
     *   
     * )
     *
     */
    public function showContents()
    {
        return new WebContentCollection( 
            WebContent::all()
        );
    }

    /**
     * Display the specified Web content.
     **
     *
     * @OA\Get(path="/api/v1/contents/{content}",
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
     *
     * @param  string  $content
     * @return \Illuminate\Http\Response
     */
    public function showContent($content)
    {
        return new WebContentCollection( 
            WebContent::where('content_area', $content)->get()
        );
    }
}

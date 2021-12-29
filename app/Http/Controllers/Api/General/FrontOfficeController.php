<?php

namespace App\Http\Controllers\Api\General;

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
     *   tags={"General: Webcontent"},
     *   summary="Get all active web contents",
     *   description="Display all active web contents",
     *   operationId="getAllWebContent",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Web content",
     *              "data": {
     *                  "webcontent": {
     *                      {
     *                          "id": "integer",
     *                          "title": "string",
     *                          "content_area": "string",
     *                          "content": "string",
     *                          "translations": {
     *                              {
     *                                  "locale": "string",
     *                                  "title": "string",
     *                                  "content": "string"
     *                              },
     *                          }
     *                      }
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
     *   
     * )
     *
     */
    public function showContents()
    {
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Web content',
                                 'data'    => new WebContentCollection( WebContent::all() )], 200); 
    }

    /**
     * Display the specified Web content.
     **
     *
     * @OA\Get(path="/api/v1/contents/{content}",
     *   tags={"General: Webcontent"},
     *   summary="Get web content",
     *   description="Expect to receive a valid content area key (Options: 'about', 'faq', 'conditions', 'contacts') and return the respective content",
     *   operationId="getWebContent",
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           example= {
     *              "status": "success",
     *              "message": "Web content",
     *              "data": {
     *                  "webcontent": {
     *                      {
     *                          "id": "integer",
     *                          "title": "string",
     *                          "content_area": "string",
     *                          "content": "string",
     *                          "translations": {
     *                              {
     *                                  "locale": "string",
     *                                  "title": "string",
     *                                  "content": "string"
     *                              },
     *                          }
     *                      }
     *                  }
     *              }
     *           },
     *      ),
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
     *      description="Not found"
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
        return response()->json(['status'  => $status  ?? 'success',
                                 'message' => $message ?? 'Web content',
                                 'data'    => new WebContentCollection( WebContent::where('content_area', $content)->get() )], 200); 

    }
}

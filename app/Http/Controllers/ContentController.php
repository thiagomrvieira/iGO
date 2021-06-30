<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    
    /**
     * Display the specified resource in a (backoffice) edit view.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($content_area)
    {   
        if ($content_area == 'faq') {
            $content = Content::where('content_area', $content_area)->get();
            return view('backoffice.web-content.content-edit-faq')->with('content', $content)
                                                                  ->with('content_area', $content_area);
        } else {
            $content = Content::where('content_area', $content_area)->first();
            return view('backoffice.web-content.content-edit')->with('content', $content)
                                                              ->with('content_area', $content_area);
        }
        
        
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $content = new Content;
        $content->title = $request->title;
        $content->content = $request->content;
        $content->content_area = $request->content_area;
        $request->active == 'on' ? $content->active = 1 : $content->active = 0;
        $content->save();

        return back();
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $content->title = $request->title;
        $content->content = $request->content;
        $request->active == 'on' ? $content->active = 1 : $content->active = 0;
        $content->save();

        return back();
    }

}

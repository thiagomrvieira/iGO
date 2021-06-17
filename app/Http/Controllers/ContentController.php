<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($content_area)
    {   
        $content = Content::where('content_area', $content_area)->first();
        return view('backoffice.web-content.content-edit')->with('content', $content);
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
        // dd($request->all());
        // $content->update($request->all());
        $content->title = $request->title;
        $content->content = $request->content;
        $request->active == 'on' ? $content->active = 1 : $content->active = 0;
        $content->save();

        return back();
    }

}

<?php

namespace App\Http\Controllers\Web;

use App\Models\WebContent;
use Illuminate\Http\Request;
use App\Http\Traits\ModelTranslationTrait;
use App\Http\Controllers\Controller;


class WebContentController extends Controller
{
    use ModelTranslationTrait;

    /**
     * Display the specified resource in a (backoffice) edit view.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($content_area)
    {   
        
        $content = WebContent::where('content_area', $content_area)->first();
        $view    = 'backoffice-admin.web-content.content-edit';

        if ($content_area == 'faq') {
            $content = WebContent::where('content_area', $content_area)->get();
            $view    = 'backoffice-admin.web-content.content-edit-faq';
        }
            
        return view($view)->with('content', $content)
                          ->with('content_area', $content_area);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->createWebContentTranslate($request);
        $content = WebContent::create($data);
        return back()->with(['message' => 'Conteúdo criado com sucesso!', 'alert' => 'alert-success']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebContent $content)
    {   
        $data = $this->updateWebContentTranslate($request);
        $content->update($data);
        return back()->with(['message' => 'Conteúdo editado com sucesso!', 'alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebContent $content)
    {
        if($content) {
            $content->delete();
        }
        return back()->with(['message' => 'Conteúdo removido com sucesso!', 'alert' => 'alert-success']);
    }

}

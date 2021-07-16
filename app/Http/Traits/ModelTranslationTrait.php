<?php

namespace App\Http\Traits;
use Illuminate\Http\Request;


trait ModelTranslationTrait {
    
    # Prepare data to the format for translation
    public function prepareDataForWebContentTranslation($request){
        
        $language     = $request->language;
        $content_area = $request->content_area;
        $title        = $request->title;
        $content      = $request->content;
        $active       = !$request->active ? 0 : 1;

        $data = [
            'content_area' => $content_area,
            $language => [
                'title'   => $title, 
                'content' => $content,
                'active'  => $active,
            ],
        ];

        return $data;
    }
    
   
}
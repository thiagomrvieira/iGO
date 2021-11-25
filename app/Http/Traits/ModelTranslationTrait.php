<?php

namespace App\Http\Traits;
use Illuminate\Http\Request;


trait ModelTranslationTrait {
    
    # Prepare data to the format for translation in update method
    public function updateWebContentTranslate($request){
        $language     = $request->language;
        $content_area = $request->content_area;
        $title        = $request->title;
        $content      = $request->content;
        $active       = !$request->active || $request->active== "off" ? 0 : 1;

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

    # Prepare data to the format for translation in store/save/create method
    public function createWebContentTranslate($request){
        
        $data    = $this->updateWebContentTranslate($request);
        $title   = $request->title;
        $content = $request->content;
        $newLang = $request->language == 'en' ? 'pt': 'en'; 

        $newData = [
            $newLang => [
                'title'   => $title,
                'content' => $content,
                'active'  => 0,
            ],
        ];
        
        $data = array_merge($data, $newData);
        return $data;
    }
    
   
}
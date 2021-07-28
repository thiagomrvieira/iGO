<?php

namespace App\Http\Traits;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


trait ImagesTrait {
    
    public function UploadPartnerImage($request) 
    {
        $imagesTypes = [
            'cover', '01', '02', '03',
        ];
        $i = 0;

        $partnerImages = new Image;
        $partnerImages->partner_id  = Auth::user()->partner->id;

        foreach ($imagesTypes as $imgType) {
            if ($image = $request->file('image-'.$imgType)) {
                $destinationPath = 'images/partner';
                $imgName = date('YmdHis') . $i . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imgName);
                
                $partnerImages->{"image_".$imgType} = $imgName;
                $i++;    
            }
        }
        
        return $partnerImages->save();
    }
}